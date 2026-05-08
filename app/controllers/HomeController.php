<?php

namespace Aleber\FireHub\Controllers;

use Aleber\FireHub\Core\Controller;

class HomeController extends Controller {

    public function index()
    {
        $data['title'] = "FireHub";
        $this->view('site/home/index', $data);
    }
}