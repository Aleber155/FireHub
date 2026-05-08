<?php
require_once "app/core/Controller.php";
require_once "app/models/UserModel.php";
require_once "app/models/ServicesModel.php";

class SettingsController extends Controller {

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // SEGURIDAD: Si no está logueado, se va al login
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: " . BASE_URL . "?url=auth/login");
            exit;
        }

        // 1. Instanciamos el modelo de servicios
        // Asegúrate de tener el require_once "app/models/ServiceModel.php" al inicio del archivo
        $serviceModel = new ServiceModel();
        $userId = $_SESSION['user_id'];

        // 2. Obtenemos los datos necesarios para la nueva sección
        $allServices = $serviceModel->getAllServices(); // Lista de todos los servicios activos
        $userServicesIds = $serviceModel->getSelectedServiceIds($userId); // IDs asignados a este usuario

        // 3. Datos para la vista (incluyendo los nuevos arrays)
        $data = [
            'title'           => 'Configuración - SANEMOG',
            'username'        => $_SESSION['username'],
            'name'            => $_SESSION['name'],
            'image'           => $_SESSION['image'],
            'allServices'     => $allServices,     // Enviamos la lista completa
            'userServicesIds' => $userServicesIds  // Enviamos lo que el usuario ya seleccionó
        ];

        // Cargamos la vista de configuración usando el layout 'admin'
        $this->view('dashboard/settings', $data, 'admin');
    }

    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            $userId = $_SESSION['user_id'];
            $newName = trim($_POST['name']);
            
            $userModel = new UserModel();
            $userData = $userModel->getUserById($userId);
            
            // 1. Obtenemos el nombre completo actual de la BD (ej: Juana_SantaMaria.webp)
            $currentImageField = $userData['image']; 
            $imageName = $currentImageField; 

            // Procesar Imagen si se subió una nueva
            if (!empty($_FILES['image']['name'])) {
                $targetDir = "public/assets/img/team/";
                
                // 2. Extraemos el NOMBRE BASE del campo de la BD (sin la extensión vieja)
                // Ejemplo: de "Juana_SantaMaria.webp" extrae "Juana_SantaMaria"
                $baseName = pathinfo($currentImageField, PATHINFO_FILENAME);
                
                // 3. Obtenemos la extensión del nuevo archivo subido
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                
                // 4. Construimos el nombre final: NombreBase_BD + Nueva_Extension
                $newFileName = $baseName . "." . $extension;
                $targetFile = $targetDir . $newFileName;

                // Si el nombre cambia (por la extensión), eliminamos el archivo anterior para no dejar basura
                if ($currentImageField !== $newFileName && file_exists($targetDir . $currentImageField)) {
                    unlink($targetDir . $currentImageField);
                }

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $imageName = $newFileName;
                    $_SESSION['image'] = $imageName; // Actualizar sesión
                }
            }

            if ($userModel->updateBasicInfo($userId, $newName, $imageName)) {
                $_SESSION['name'] = $newName;
                // Añadimos el parámetro t para evitar que el navegador use la imagen vieja en caché
                header("Location: " . BASE_URL . "?url=settings&msg=profile_success&t=" . time());
                exit;
            } else {
                header("Location: " . BASE_URL . "?url=settings&msg=error");
                exit;
            }
        }
    }

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $userId = $_SESSION['user_id'];
            $oldPass = $_POST['old_password'];
            $newPass = $_POST['new_password'];
            $confirmPass = $_POST['confirm_password'];

            if ($newPass !== $confirmPass) {
                header("Location: " . BASE_URL . "?url=settings&msg=pass_mismatch");
                exit;
            }

            $userModel = new UserModel();
            $user = $userModel->getUserById($userId);

            // Validar contraseña actual con el cifrado de la BD
            if (password_verify($oldPass, $user['password'])) {
                $hashedPass = password_hash($newPass, PASSWORD_BCRYPT);
                if ($userModel->updatePassword($userId, $hashedPass)) {
                    header("Location: " . BASE_URL . "?url=settings&msg=pass_success");
                }
            } else {
                header("Location: " . BASE_URL . "?url=settings&msg=old_pass_wrong");
            }
        }
    }

    public function updateUserServices() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) session_start();
            
            $userId = $_SESSION['user_id'];
            $servicesIds = $_POST['servicios'] ?? []; // Si no marca ninguno, enviamos array vacío

            $serviceModel = new ServiceModel();
            
            if ($serviceModel->syncUserServices($userId, $servicesIds)) {
                header("Location: " . BASE_URL . "?url=settings&msg=profile_success");
            } else {
                header("Location: " . BASE_URL . "?url=settings&msg=error");
            }
            exit;
        }
    }
}