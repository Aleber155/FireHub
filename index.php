<?php
// 1. Mostrar errores (Solo para desarrollo, en producción ponlos en 0)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Iniciar sesión
session_start();

// 3. Autoloader de Composer
require_once __DIR__ . '/vendor/autoload.php';

// AÑADIDO: Cargar variables de entorno (.env) para que funcione PHPMailer y la DB
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

// 4. Archivo de configuración base (Constantes, DB, etc.)
if (file_exists(__DIR__ . '/app/config/App.php')) {
    require_once __DIR__ . '/app/config/App.php';
}

// 5. Instanciar y ejecutar el Enrutador principal
use Aleber\FireHub\Core\Router;

try {
    $router = new Router();
    $router->run();
} catch (Exception $e) {
    // Si algo crítico falla en la aplicación, lo atrapamos aquí elegantemente
    echo "<h1>Error Crítico en FireHub</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}