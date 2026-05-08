<?php
// app/config/App.php

// Detectar protocolo (http o https)
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";

// Detectar el host (localhost:8080)
$host = $_SERVER['HTTP_HOST'];

// Definir la constante BASE_URL apuntando a la carpeta de tu proyecto
// Asegúrate de que termine en una barra diagonal '/'
define("BASE_URL", $protocol . "://" . $host . "/FireHub/");

// Opcional: Nombre de la aplicación
define("APP_NAME", "FireHub");