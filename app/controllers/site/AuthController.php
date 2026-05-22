<?php

namespace Aleber\FireHub\Controllers\Site;

use Aleber\FireHub\Core\Controller;
use Aleber\FireHub\Models\UserModel;

class AuthController extends Controller {

    public function login() {

        // 1. Iniciar sesión si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 2. Protección: Si ya está logueado, lo enviamos directo al Dashboard
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            // Nota: Ajusta la redirección si no usas URLs limpias (ej: ?url=portal/dashboard)
            $dashboardUrl = defined('BASE_URL') ? BASE_URL . 'portal/dashboard' : '/portal/dashboard';
            header("Location: " . $dashboardUrl);
            exit;
        }

        // 3. Preparamos los datos que le enviaremos a la vista
        $data = [
            'title'         => "Acceso a Portal - FireHub",
            'error_message' => '',
            'username'      => ''
        ];

        // 4. Verificamos si el usuario envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $data['username'] = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            if (!empty($data['username']) && !empty($password)) {
                
                // Instanciamos el modelo y buscamos al usuario
                // Recordatorio: En FireHub el username puede ser el DNI o el Código de Bombero
                $userModel = new UserModel();
                $user = $userModel->findByUsername($data['username']);

                // Verificamos la contraseña (asumiendo que usaste password_hash al registrarlos)
                if ($user && password_verify($password, $user['password'])) {
                    
                    // Regeneramos el ID de sesión por seguridad (evita Session Fixation)
                    session_regenerate_id(true);

                    // Login exitoso - Guardamos datos útiles en sesión
                    $_SESSION['user_id']   = $user['id'];
                    // Si tu DB tiene otros nombres de columna, cámbialos aquí (ej: $user['nombres'])
                    $_SESSION['name']      = $user['name'] ?? 'Usuario'; 
                    $_SESSION['logged_in'] = true;

                    // Redirigir al panel de control (Dashboard)
                    $dashboardUrl = defined('BASE_URL') ? BASE_URL . 'portal/dashboard' : '/portal/dashboard';
                    header("Location: " . $dashboardUrl);
                    exit;
                } else {
                    $data['error_message'] = 'Credenciales incorrectas. Verifica tu DNI/Código y contraseña.';
                }
            } else {
                $data['error_message'] = 'Por favor, completa todos los campos.';
            }
        }

        // 5. Cargamos la vista de login
        // Apuntamos a la carpeta correcta: views/portal/auth/login.php
        $this->view('portal/auth/login', $data, false);
    }

    public function logout() {
        // Iniciar sesión si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Destruir todas las variables de sesión y la sesión misma
        session_unset();
        session_destroy();

        // Redirigir al login
        $loginUrl = defined('BASE_URL') ? BASE_URL . 'portal/auth/login' : '/portal/auth/login';
        header("Location: " . $loginUrl);
        exit;
    }
}