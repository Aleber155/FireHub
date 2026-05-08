<?php
require_once "app/core/Controller.php";
require_once "app/models/CalendarModel.php";

class CalendarController extends Controller {

    public function index() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        // SEGURIDAD: Validar sesión activa
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: " . BASE_URL . "?url=auth/login");
            exit;
        }

        $calendarModel = new CalendarModel();
        
        // 1. Manejo de fechas (Mes, Año y Día seleccionado)
        $mes = isset($_GET['month']) ? (int)$_GET['month'] : date('m');
        $anio = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');
        
        // Ajuste para navegación de meses (si el mes es 0 o 13)
        if ($mes < 1) { $mes = 12; $anio--; }
        if ($mes > 12) { $mes = 1; $anio++; }

        $fechaActual = isset($_GET['selected_date']) ? $_GET['selected_date'] : date('Y-m-d');

        // 2. Obtener datos del Modelo
        $disponibilidad = $calendarModel->getAvailabilityByMonth($mes, $anio);
        $agendaDia = $calendarModel->getAvailabilityByDay($fechaActual);
        $consultores = $calendarModel->getActiveConsultants(); // <-- ESTO CORRIGE EL ERROR

        $data = [
            'title'          => 'Calendario de Disponibilidad - SANEMOG',
            'username'       => $_SESSION['username'],
            'name'           => $_SESSION['name'],
            'image'          => $_SESSION['image'],
            'disponibilidad' => $disponibilidad,
            'agendaDia'      => $agendaDia,
            'consultores'    => $consultores, // Enviamos los consultores a la vista
            'fechaActual'    => $fechaActual,
            'mes'            => $mes,
            'anio'           => $anio
        ];

        $this->view('dashboard/calendar', $data, 'admin');
    }

    /**
     * Guarda un nuevo rango horario
     */
    public function saveRange() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) session_start();
            
            $calendarModel = new CalendarModel();
            $userId = $_SESSION['user_id'];
            $fecha = $_POST['fecha'];
            $inicio = $_POST['hora_inicio'];
            $fin = $_POST['hora_fin'];

            // 1. Validar que la hora de inicio sea menor a la de fin
            if ($inicio >= $fin) {
                header("Location: " . BASE_URL . "?url=calendar&selected_date=$fecha&msg=error_time");
                exit;
            }

            // 2. Verificar cruces de horarios PROPIOS
            $misRangos = $calendarModel->getAvailabilityByDay($fecha);
            foreach ($misRangos as $r) {
                if ($r['usuario_id'] == $userId) {
                    // Lógica: (InicioA < FinB) Y (FinA > InicioB)
                    if ($inicio < $r['hora_fin'] && $fin > $r['hora_inicio']) {
                        header("Location: " . BASE_URL . "?url=calendar&selected_date=$fecha&msg=error_overlap");
                        exit;
                    }
                }
            }

            // 3. Si todo está bien, guardar
            $data = [
                'usuario_id'  => $userId,
                'fecha'       => $fecha,
                'hora_inicio' => $inicio,
                'hora_fin'    => $fin
            ];

            if ($calendarModel->addAvailability($data)) {
                header("Location: " . BASE_URL . "?url=calendar&selected_date=$fecha&msg=success");
            } else {
                header("Location: " . BASE_URL . "?url=calendar&selected_date=$fecha&msg=error");
            }
            exit;
        }
    }

    /**
     * Elimina un rango propio
     */
    public function deleteRange() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $userId = $_SESSION['user_id'];
            $calendarModel = new CalendarModel();

            if ($calendarModel->deleteAvailability($id, $userId)) {
                header("Location: " . BASE_URL . "?url=calendar&msg=success_delete");
            } else {
                header("Location: " . BASE_URL . "?url=calendar&msg=error");
            }
            exit;
        }
    }
}