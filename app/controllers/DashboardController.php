<?php
require_once "app/core/Controller.php";
require_once "app/models/BookingModel.php"; // IMPORTANTE: Requerir el modelo

class DashboardController extends Controller {

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // SEGURIDAD: Si no está logueado, se va al login
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: " . BASE_URL . "?url=auth/login");
            exit;
        }

        // 1. Instanciamos el modelo de Booking
        $bookingModel = new BookingModel();

        // 2. Obtenemos las citas de la base de datos
        // Esta variable $citas es la que tu vista index.php recorre con el foreach
        $citas = $bookingModel->getAllCitas();

        // 3. Preparamos los datos para la vista
        $data = [
            'title'    => 'Panel de Control - SANEMOG',
            'username' => $_SESSION['username'],
            'name'     => $_SESSION['name'],
            'image'    => $_SESSION['image'],
            'citas'    => $citas // ENVIAMOS LOS DATOS AQUÍ
        ];

        // 4. Cargamos la vista de dashboard
        $this->view('dashboard/index', $data, 'admin');
    }

    /**
     * Procesa el cambio de estado de una cita (Confirmar/Cancelar)
     * Se accede vía: ?url=dashboard/updateStatus&id=X&status=Y
     */
    public function updateStatus() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Validar que existan los parámetros necesarios
        if (isset($_GET['id']) && isset($_GET['status'])) {
            $id = (int)$_GET['id'];
            $status = $_GET['status'];
            
            $bookingModel = new BookingModel();
            
            // Intentar actualizar en la DB
            if ($bookingModel->updateCitaStatus($id, $status)) {
                // Redirigir de nuevo al dashboard con mensaje de éxito
                header("Location: " . BASE_URL . "?url=dashboard&msg=status_updated");
            } else {
                header("Location: " . BASE_URL . "?url=dashboard&msg=error");
            }
            exit;
        }
    }
}