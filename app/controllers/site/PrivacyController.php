<?php

namespace Aleber\FireHub\Controllers\Site;

use Aleber\FireHub\Core\Controller;

class PrivacyController extends Controller {

    public function index() {
        // Renderizamos la vista usando el Core Controller
        // Parámetros: ruta de la vista, variables, nombre del layout (para que cargue header y footer)
        $this->view('site/contact/privacy', [
            'title' => 'Políticas de Privacidad'
        ], 'public');
    }

}