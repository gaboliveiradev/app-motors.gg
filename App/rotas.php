<?php
use App\Controller\{
    UsuarioController,
    VeiculoController,
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

    // == [OK] == Rotas de Login
    case "/login":
        UsuarioController::form();
    break;

    case "/login/autenticar":
        UsuarioController::autenticar();
    break;

    case "/veiculo/form":
        VeiculoController::form();
    break;

    default:
        header("Location: /login");
    break;
}