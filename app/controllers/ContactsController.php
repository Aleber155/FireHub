<?php
require_once "app/core/Controller.php";
require_once "app/models/ContactsModel.php";

class ContactsController extends Controller {

    /**
     * Obtiene contactos en formato JSON para el modal
     */
    public function getByCliente() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        header('Content-Type: application/json');

        // Seguridad: Solo usuarios logueados y con un ID válido
        if (!isset($_SESSION['logged_in']) || !isset($_GET['id'])) {
            echo json_encode([]);
            exit;
        }

        $clienteId = $_GET['id'];
        $contactModel = new ContactsModel();
        $contactos = $contactModel->getContactsByCliente($clienteId);

        echo json_encode($contactos);
    }

    /**
     * Procesa el guardado/edición de un contacto vía AJAX
     */
    public function save() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        header('Content-Type: application/json');

        // Validación de seguridad
        if (!isset($_SESSION['logged_in']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Acceso no autorizado']);
            exit;
        }

        // Recolectamos datos del FormData enviado por el fetch de JS
        $data = [
            'id'         => !empty($_POST['id']) ? $_POST['id'] : null,
            'cliente_id' => $_POST['cliente_id'],
            'nombre'     => trim($_POST['nombre']),
            'cargo'      => trim($_POST['cargo']),
            'telefono'   => trim($_POST['telefono']),
            'correo'     => trim($_POST['correo'])
        ];

        $contactModel = new ContactsModel();
        $result = $contactModel->saveContact($data);

        // Devolvemos el resultado para que el JS en la vista actúe
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al guardar en la base de datos']);
        }
    }

    public function delete() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        header('Content-Type: application/json');

        if (!isset($_SESSION['logged_in']) || !isset($_GET['id'])) {
            echo json_encode(['success' => false, 'message' => 'Parámetros insuficientes']);
            exit;
        }

        $contactModel = new ContactsModel();
        $result = $contactModel->deleteContact($_GET['id']);

        echo json_encode(['success' => $result]);
    }
}