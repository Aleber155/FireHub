<?php

namespace Aleber\FireHub\Core;

class Router {

    public function run() {

        $url = isset($_GET['url']) ? explode('/', $_GET['url']) : ['home'];

        $controllerName = ucfirst($url[0]) . 'Controller';
        $method = $url[1] ?? 'index';

        $controllerClass = "Aleber\\FireHub\\Controllers\\$controllerName";

        if (class_exists($controllerClass)) {

            $controller = new $controllerClass();

            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                echo "Método no encontrado";
            }

        } else {
            echo "Controlador no encontrado";
        }
    }
}