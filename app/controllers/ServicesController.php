<?php
require_once "app/core/Controller.php";
require_once "app/models/ServicesModel.php";

class ServicesController extends Controller {

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // SEGURIDAD: Validar sesión activa
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: " . BASE_URL . "?url=auth/login");
            exit;
        }

        $serviceModel = new ServiceModel();

        // Obtenemos todos los servicios activos directamente del modelo
        $servicios = $serviceModel->getAllServices();
        
        // Preparamos los datos para la vista (Dashboard/Services)
        $data = [
            'servicios' => $servicios,
            'title'     => 'Servicios - SANEMOG',
            'username'  => $_SESSION['username'],
            'name'      => $_SESSION['name'],
            'image'     => $_SESSION['image']
        ];

        // Cargamos la vista con el layout 'admin'
        $this->view('dashboard/services', $data, 'admin');
    }

    /**
     * Procesa el guardado de un servicio (Nuevo o Editado)
     */
    public function save() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['logged_in'])) {
            header("Location: " . BASE_URL . "?url=auth/login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serviceModel = new ServiceModel();

            // 1. Recolectar datos del formulario
            $data = [
                'nombre'   => trim($_POST['nombre']),
                'duracion' => (int)$_POST['duracion'],
                'precio'   => (float)$_POST['precio']
            ];

            // 2. Determinar si es una actualización o creación
            if (!empty($_POST['id'])) {
                // Actualizar existente
                $id = (int)$_POST['id'];
                $result = $serviceModel->updateService($id, $data);
            } else {
                // Crear nuevo
                $result = $serviceModel->createService($data);
            }

            // 3. Redirección con mensaje de estado
            if ($result) {
                header("Location: " . BASE_URL . "?url=services&msg=success");
            } else {
                header("Location: " . BASE_URL . "?url=services&msg=error");
            }
            exit;
        }
    }

    /**
     * Inactivar un servicio (Eliminación Lógica)
     */
    public function delete() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $serviceModel = new ServiceModel();

            if ($serviceModel->deleteService($id)) {
                header("Location: " . BASE_URL . "?url=services&msg=success_delete");
            } else {
                header("Location: " . BASE_URL . "?url=services&msg=error");
            }
            exit;
        }
    }

    public function toggleStatus() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $serviceModel = new ServiceModel();
            $servicio = $serviceModel->getServiceById($id);
            
            // Invertimos el estado actual
            $nuevoEstado = ($servicio['estado'] == 1) ? 0 : 1;
            
            // Usamos una pequeña variación de tu método update o creamos uno nuevo en el modelo
            if ($serviceModel->updateStatus($id, $nuevoEstado)) {
                header("Location: " . BASE_URL . "?url=services&msg=success_update");
            } else {
                header("Location: " . BASE_URL . "?url=services&msg=error");
            }
        }
    }
}