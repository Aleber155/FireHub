<?php

namespace Aleber\FireHub\Core;

class Router {

    public function run() {

        // 1. Limpiamos y obtenemos la URL (rtrim quita la barra final si existe)
        $urlString = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
        $url = explode('/', $urlString);

        // 2. Por defecto, asumimos que estamos en el lado público (Site)
        $namespace = "Aleber\\FireHub\\Controllers\\Site\\";

        // 3. Detectamos si la URL solicita el panel de administración
        if ($url[0] === 'admin') {
            // Cambiamos el Namespace apuntando a la carpeta Admin
            $namespace = "Aleber\\FireHub\\Controllers\\Admin\\";
            
            // Eliminamos la palabra 'admin' del array para que el siguiente
            // elemento se convierta en el controlador real.
            array_shift($url); 

            // Si el usuario solo escribió "misitio.com/admin", el array quedará vacío.
            // Le asignamos un controlador por defecto para el admin (ej. Dashboard)
            if (empty($url) || $url[0] == '') {
                $url[0] = 'dashboard'; 
            }
        }

        // 4. Construimos el nombre del Controlador y el Método
        $controllerName = ucfirst($url[0]) . 'Controller';
        $method = $url[1] ?? 'index';

        // 5. Unimos el Namespace con el Controlador
        $controllerClass = $namespace . $controllerName;

        // 6. Instanciamos y ejecutamos
        if (class_exists($controllerClass)) {

            $controller = new $controllerClass();

            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                // Idealmente, aquí deberías cargar una vista de Error 404
                echo "Error: Método '{$method}' no encontrado en '{$controllerName}'.";
            }

        } else {
            // Idealmente, aquí deberías cargar una vista de Error 404
            echo "Error: Controlador '{$controllerClass}' no encontrado.";
        }
    }
}