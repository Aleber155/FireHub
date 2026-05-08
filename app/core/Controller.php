<?php

namespace Aleber\FireHub\Core;

class Controller {

    // Por defecto, usamos el layout 'public'
    protected function view(string $view, array $data = [], string $layout = 'public') {

        if (!empty($data)) {
            extract($data);
        }
 
        $viewPath = __DIR__ . "/../views/$view.php";

        if (file_exists($viewPath)) {
            
            // 1. CARGAMOS EL HEADER DEPENDIENDO DEL LAYOUT
            if ($layout === 'public') {
                require_once __DIR__ . "/../views/layouts/header.php";
            } elseif ($layout === 'admin') {
                require_once __DIR__ . "/../views/layouts/admin_header.php";
            }

            // 2. CARGAMOS LA VISTA PRINCIPAL (El contenido del medio)
            require_once $viewPath;

            // 3. CARGAMOS EL FOOTER DEPENDIENDO DEL LAYOUT
            if ($layout === 'public') {
                require_once __DIR__ . "/../views/layouts/footer.php";
            } elseif ($layout === 'admin') {
                require_once __DIR__ . "/../views/layouts/admin_footer.php";
            }

        } else {
            die("Error: La vista '{$view}' no existe.");
        }
    }
}