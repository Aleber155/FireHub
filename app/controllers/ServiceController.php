<?php

class ServiceController {

    public function index() {
        $title = "Servicios";
        require_once "app/views/layouts/header.php";
        require_once "app/views/services/services.php";
        require_once "app/views/layouts/footer.php";
    }

}