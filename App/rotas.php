<?php
use App\Controller\{
    BackupController,
    CombustivelController,
    DashboardController,
    FabricanteController,
    LixeiraController,
    MarcaController,
    TipoVeiculoController,
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


    // == [OK] == Rotas de Veiculo
    case "/veiculo/form":
        VeiculoController::form();
    break;

    // == [OK] == Rotas de Combustivel
    case "/combustivel/form":
        CombustivelController::form();
    break;

    case "/combustivel/salvar":
        CombustivelController::salvar();
    break;

    case "/combustivel/deletar":
        CombustivelController::deletar();
    break;

    case "/combustivel/get-by-id":
        CombustivelController::getById();
    break;


    // == [OK] == Rotas de Fabricante
    case "/fabricante/form":
        FabricanteController::form();
    break;

    case "/fabricante/salvar":
        FabricanteController::salvar();
    break;

    case "/fabricante/deletar":
        FabricanteController::deletar();
    break;

    case "/fabricante/get-by-id":
        FabricanteController::getById();
    break;


    // == [OK] == Rotas de Marca
    case "/marca/form":
        MarcaController::form();
    break;

    case "/marca/salvar":
        MarcaController::salvar();
    break;

    case "/marca/deletar":
        MarcaController::deletar();
    break;

    case "/marca/get-by-id":
        MarcaController::getById();
    break;


    // == [OK] == Rotas de Tipo Veículo
    case "/tipo-veiculo/form":
        TipoVeiculoController::form();
    break;

    case "/tipo-veiculo/salvar":
        TipoVeiculoController::salvar();
    break;

    case "/tipo-veiculo/deletar":
        TipoVeiculoController::deletar();
    break;

    case "/tipo-veiculo/get-by-id":
        TipoVeiculoController::getById();
    break;
    

    // == [OK] == Rotas de Veículo
    case "/veiculo/salvar":
        VeiculoController::salvar();
    break;

    case "/veiculo/deletar":
        VeiculoController::deletar();
    break;


    // == [OK] == Rotas de Dashboard
    case "/dashboard":
        DashboardController::index();
    break;


    // == [OK] == Query's
    case "/get/all/combustivel":
        CombustivelController::getAllRows();
    break;

    case "/get/all/fabricante":
        FabricanteController::getAllRows();
    break;

    case "/get/all/marca":
        MarcaController::getAllRows();
    break;

    case "/get/all/tipo-veiculo":
        TipoVeiculoController::getAllRows();
    break;

    case "/get/all/veiculo":
        VeiculoController::getAllRows();
    break;


    // == [OK] == Rotas de Backup
    case "/exportar":
        BackupController::export();
    break;

    case "/importar":
        BackupController::import();
    break;


    // == [OK] == Rotas de Backup
    case "/lixeira":
        LixeiraController::view();
    break;


    // == [OK] == Rota Padrão
    default:
        header("Location: /login");
    break;
}