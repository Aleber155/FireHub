<?php
require_once "app/core/Controller.php";
require_once "app/models/ClientsModel.php";

class ClientsController extends Controller {

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // SEGURIDAD: Validar sesión activa
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: " . BASE_URL . "?url=auth/login");
            exit;
        }

        // Instanciar modelo
        $clienteModel = new ClientsModel();

        // NUEVO: Obtener conteos globales para los filtros
        $totalTodos = $clienteModel->getTotalClientes();
        $totalActivos = $clienteModel->getTotalClientesPorEstado(1);
        $totalInactivos = $clienteModel->getTotalClientesPorEstado(0);
        
        // 1. Configuración de paginación DINÁMICA
        // Recibimos 'limit' desde la URL, si no existe usamos 6
        $registrosPorPagina = isset($_GET['limit']) ? (int)$_GET['limit'] : 6;
        
        // Validar que el límite sea razonable (mínimo 1, máximo 50 para seguridad)
        if ($registrosPorPagina < 1) $registrosPorPagina = 6;
        if ($registrosPorPagina > 50) $registrosPorPagina = 50;

        $paginaActual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($paginaActual < 1) $paginaActual = 1;
        
        // 2. Calcular el inicio (Offset)
        $inicio = ($paginaActual - 1) * $registrosPorPagina;

        // 3. Obtener registros con el límite dinámico
        $clientes = $clienteModel->getClientesPaginados($inicio, $registrosPorPagina);
        
        // 4. Obtener total de registros para el cálculo de páginas
        $totalRegistros = $clienteModel->getTotalClientes();
        $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

        // Evitar que la página actual sea mayor al total de páginas tras un cambio de límite
        if ($paginaActual > $totalPaginas && $totalPaginas > 0) {
            header("Location: " . BASE_URL . "?url=clients&page=1&limit=" . $registrosPorPagina);
            exit;
        }

        $data = [
            'clientes'          => $clientes,
            'totalPaginas'      => $totalPaginas,
            'paginaActual'      => $paginaActual,
            'registrosPorPagina'=> $registrosPorPagina, // Importante pasar esto a la vista
            'totalRegistros'    => $totalRegistros,
            'totalTodos'        => $totalTodos,
            'totalActivos'      => $totalActivos,
            'totalInactivos'    => $totalInactivos,
            'title'             => 'Clientes - SANEMOG',
            'username'          => $_SESSION['username'],
            'name'              => $_SESSION['name'],
            'image'             => $_SESSION['image']
        ];

        $this->view('dashboard/clients', $data, 'admin');
    }
    /**
     * Procesa el guardado de un cliente (Nuevo o Editado)
     */
    public function save() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Seguridad básica
        if (!isset($_SESSION['logged_in'])) {
            header("Location: " . BASE_URL . "?url=auth/login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 1. Capturar la página actual para el redireccionamiento
            // Si no viene en el POST, por defecto será la 1
            $page = isset($_POST['current_page']) ? (int)$_POST['current_page'] : 1;

            // 2. Manejo del Switch de Estado
            $estadoValue = isset($_POST['estado']) ? 1 : 0;

            // 3. Recolectar datos del formulario
            $data = [
                'id'             => !empty($_POST['id']) ? $_POST['id'] : null,
                'razon_social'   => trim($_POST['razon_social']),
                'ruc'            => trim($_POST['ruc']),
                'tipo_industria' => trim($_POST['tipo_industria']),
                'estado'         => $estadoValue
            ];

            $clienteModel = new ClientsModel();
            
            // 4. Ejecutar el guardado
            if ($clienteModel->save($data)) {
                // Redirigir manteniendo la página actual y mensaje de éxito
                header("Location: " . BASE_URL . "?url=clients&page=" . $page . "&msg=success");
            } else {
                // Redirigir manteniendo la página actual y mensaje de error
                header("Location: " . BASE_URL . "?url=clients&page=" . $page . "&msg=error");
            }
            exit;
        }
    }
}