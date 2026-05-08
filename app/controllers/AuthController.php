<?php

require_once "app/core/Controller.php";
require_once "app/models/UserModel.php";

class AuthController extends Controller {

    public function login() {

        // 1. Iniciar sesión si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 2. Preparamos los datos que le enviaremos a la vista
        $data = [
            'title'         => "Autenticación - SANEMOG CONSULTING",
            'error_message' => '',
            'username'      => ''
        ];

        // 3. Verificamos si el usuario envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['username'] = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            if (!empty($data['username']) && !empty($password)) {
                
                // Instanciamos el modelo y buscamos al usuario
                $userModel = new UserModel();
                $user = $userModel->findByUsername($data['username']);

                // Verificamos la contraseña
                if ($user && password_verify($password, $user['password'])) {
                    // Login exitoso
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['image'] = $user['image'];
                    $_SESSION['logged_in'] = true;

                    // Redirigir a booking
                    header("Location: " . BASE_URL . "?url=dashboard");
                    exit;
                } else {
                    $data['error_message'] = 'Usuario o contraseña incorrectos.';
                }
            } else {
                $data['error_message'] = 'Por favor, completa todos los campos.';
            }
        }

        // 4. Cargamos la vista de login
        // Le pasamos $data (que incluye el title, username y error_message)
        // Le pasamos 'false' al final para que NO cargue el header ni el footer global
        $this->view('auth/login', $data, false);
    }

    public function logout() {
        // Iniciar sesión si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Destruir la sesión
        session_unset();
        session_destroy();

        // Redirigir al login
        header("Location: " . BASE_URL . "?url=auth/login");
        exit;
    }
}