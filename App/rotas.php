<?php
use App\Controller\{
    UsuarioController,
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

    // == [OK] == Rotas de Login
    case "/login":
        UsuarioController::formLogin();
    break;

    default:
        header("Location: /login");
    break;
}