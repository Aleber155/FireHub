<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';
if (file_exists(__DIR__ . '/app/config/App.php')) {
    require_once __DIR__ . '/app/config/App.php';
}

use Aleber\FireHub\Core\Router;

$router = new Router();
$router->run();