<?php

class TeamController {

    public function index() {
        $title = "Nuestro Equipo";
        require_once "app/views/layouts/header.php";
        require_once "app/views/about/team.php";
        require_once "app/views/layouts/footer.php";
    }

}