<?php

namespace Aleber\FireHub\Controllers\Site;

use Aleber\FireHub\Core\Controller;

class EmergencyController extends Controller {

    public function index()
    {
        $data['title'] = "FireHub";
        $this->view('site/services/emergency', $data);
    }
}