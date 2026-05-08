<?php

require_once "app/core/Controller.php";

// 1. Importamos todos los modelos necesarios en la parte superior
require_once "app/models/ServicesModel.php";
require_once "app/models/UserModel.php";
require_once "app/models/BookingModel.php";
require_once "app/models/ClientsModel.php";
require_once "app/models/ContactsModel.php";

class BookingController extends Controller {

    /**
     * Carga la vista inicial del formulario
     */
    public function index() {
        // Instanciamos el modelo directamente con 'new'
        $serviceModel = new ServiceModel(); 
        $servicios = $serviceModel->getAllServices();

        $data = [
            'title' => "Reservar Citas",
            'servicios' => $servicios
        ];
        
        $this->view('contact/booking', $data);
    }

    /**
     * AJAX: Retorna consultores vinculados a un servicio específico
     * Endpoint: ?url=booking/getConsultants&sId=X
     */
    public function getConsultants() {
        $sId = $_GET['sId'] ?? null;
        
        if (!$sId) {
            echo json_encode([]);
            exit;
        }

        $userModel = new UserModel();
        // Asegúrate de tener el método getByServicio() en tu UserModel
        $consultores = $userModel->getByServicio($sId);

        header('Content-Type: application/json');
        echo json_encode($consultores);
        exit;
    }

    /**
     * AJAX: Retorna horarios disponibles
     * Endpoint: ?url=booking/getSlots&uId=X&date=YYYY-MM-DD&sId=Y
     */
    public function getSlots() {
        $uId = $_GET['uId'] ?? null;
        $date = $_GET['date'] ?? null;
        $sId = $_GET['sId'] ?? null;

        if (!$uId || !$date || !$sId) {
            echo json_encode([]);
            exit;
        }

        // Obtener la duración del servicio
        $serviceModel = new ServiceModel();
        $servicio = $serviceModel->getServiceById($sId);
        
        if (!$servicio) {
            echo json_encode([]);
            exit;
        }

        $duracion = (int)$servicio['duracion'];

        // Consultar slots disponibles reales
        $bookingModel = new BookingModel();
        $slots = $bookingModel->getAvailableSlots($uId, $date, $duracion);

        header('Content-Type: application/json');
        echo json_encode($slots);
        exit;
    }

    /**
     * Procesa el formulario final de reserva (POST)
     * Endpoint: ?url=booking/confirm
     */
    public function confirm() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // --- A. Recibir Datos ---
            $sId = $_POST['service_id'];
            $uId = $_POST['user_id'];
            $fecha = $_POST['date'];
            $horaInicio = $_POST['time'];
            
            $ruc = $_POST['ruc'];
            $razonSocial = $_POST['razon_social'];
            $industria = $_POST['tipo_industria'];
            
            $nombreContacto = $_POST['nombre_contacto'];
            $cargo = $_POST['cargo'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];

            // --- B. Calcular Datos del Servicio ---
            $serviceModel = new ServiceModel();
            $servicio = $serviceModel->getServiceById($sId);
            
            $duracionSegundos = $servicio['duracion'] * 60;
            $horaFin = date('H:i:s', strtotime($horaInicio) + $duracionSegundos);
            $precioTotal = $servicio['precio'];

            // --- C. Gestión de Cliente ---
            $clientsModel = new ClientsModel();
            $clienteExistente = $clientsModel->getByRuc($ruc); 
            
            if ($clienteExistente) {
                $clienteId = $clienteExistente['id'];
            } else {
                $clientData = [
                    'id' => null,
                    'razon_social' => $razonSocial,
                    'ruc' => $ruc,
                    'tipo_industria' => $industria,
                    'estado' => 1
                ];
                $clientsModel->save($clientData);
                $clienteId = $clientsModel->getByRuc($ruc)['id']; 
            }

            // --- D. Gestión de Contacto ---
            $contactsModel = new ContactsModel();
            
            // Validamos si el contacto ya está registrado para no duplicarlo
            $contactoExistente = $contactsModel->getByEmailAndCliente($email, $clienteId);
            
            if (!$contactoExistente) {
                // Solo si NO existe, lo guardamos como un contacto nuevo
                $contactData = [
                    'id' => null,
                    'cliente_id' => $clienteId,
                    'nombre' => $nombreContacto,
                    'cargo' => $cargo,
                    'correo' => $email,
                    'telefono' => $telefono
                ];
                $contactsModel->saveContact($contactData);
            }
            // Si ya existe, simplemente lo ignoramos y pasamos a crear la cita (Paso E)

            // --- E. Crear la Reserva ---
            $bookingModel = new BookingModel();
            $bookingData = [
                'usuario_id'  => $uId,
                'cliente_id'  => $clienteId,
                'servicio_id' => $sId,
                'fecha'       => $fecha,
                'hora_inicio' => $horaInicio,
                'hora_fin'    => $horaFin,
                'monto'       => $precioTotal,
                'notas'       => "Generado desde la web pública."
            ];

            if ($bookingModel->createReservation($bookingData)) {
                header("Location: " . BASE_URL . "?url=booking/success");
                exit;
            } else {
                die("Error crítico al procesar la reserva en la base de datos.");
            }
        }
    }
    
    /**
     * Vista de Éxito
     */
    public function success() {
        $data = ['title' => 'Reserva Confirmada'];
        $this->view('contact/success', $data); 
    }
}