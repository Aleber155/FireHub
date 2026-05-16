<?php

namespace Aleber\FireHub\Controllers\Site;

use Aleber\FireHub\Core\Controller;

class OrganicController extends Controller {

    public function index()
    {
        $data['title'] = "FireHub";
        $this->view('site/about/organic', $data);
    }
}