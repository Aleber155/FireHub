<?php

namespace Aleber\FireHub\Controllers\Site;

use Aleber\FireHub\Core\Controller;

class TrainingController extends Controller {

    public function index()
    {
        $data['title'] = "FireHub";
        $this->view('site/services/training', $data);
    }
}