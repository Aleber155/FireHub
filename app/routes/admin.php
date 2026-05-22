<?php
// app/routes/admin.php

// 1. Iniciamos sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Obtenemos la URL actual
$urlString = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
$urlParts = explode('/', $urlString);

// 3. Si alguien intenta entrar a CUALQUIER ruta que empiece con "admin"...
if ($urlParts[0] === 'admin') {
    
    // Y no es la página de login...
    $isLoginRoute = isset($urlParts[1]) && $urlParts[1] === 'auth';
    
    // Y no tiene una sesión de administrador activa...
    if (!$isLoginRoute && !isset($_SESSION['admin_logged_in'])) {
        
        // Lo pateamos de vuelta al login
        header('Location: /admin/auth/login');
        exit;
    }
}