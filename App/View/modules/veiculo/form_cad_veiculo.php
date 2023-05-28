<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../../../View/css/header.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <?php include "./View/includes/css_config.php" ?>
  <?php include "./View/includes/js_config.php" ?>
  <title>Motors.GG - Cadastrar Veículo.</title>
</head>
<body>
  <header>
      <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand title__navbar" href="#">
            <div class="img"></div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                <div class="img__ofcanvas"></div>
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item itens">
                  <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-houses-fill"></i> Dashboard</a>
                </li>
                <li class="nav-item itens">
                  <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-fuel-pump-fill"></i> Combutível</a>
                </li>
                <li class="nav-item itens">
                  <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-buildings-fill"></i> Fabricante</a>
                </li>
                <li class="nav-item itens">
                  <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-tags-fill"></i> Marca</a>
                </li>
                <li class="nav-item itens">
                  <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-bus-front"></i> Tipo do Veículo</a>
                </li>
                <li class="nav-item itens">
                  <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-car-front-fill"></i> Veículo</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Gerenciamento de Dados
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Registros Excluidos</a></li>
                    <li><a class="dropdown-item" href="#">Sistema de LOG</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Credenciamento de Usuário
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Criar Novo Usuário</a></li>
                    <li><a class="dropdown-item" href="#">Todos Usuários</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Configurações de SGBD
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Exportar Banco de Dados</a></li>
                    <li><a class="dropdown-item" href="#">Importar Banco de Dados</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
  </header>
</body>
</html>