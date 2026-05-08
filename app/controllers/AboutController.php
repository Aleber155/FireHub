<?php

class AboutController {

    public function index() {
        $title = "Nosotros";
        require_once "app/views/layouts/header.php";
        require_once "app/views/about/about.php";
        require_once "app/views/layouts/footer.php";
    }

}