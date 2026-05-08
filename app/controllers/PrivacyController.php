<?php

class PrivacyController {

    public function index() {
        $title = "Políticas de Privacidad";
        require_once "app/views/layouts/header.php";
        require_once "app/views/contact/privacy.php";
        require_once "app/views/layouts/footer.php";
    }

}