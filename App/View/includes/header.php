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
              <a class="nav-link active" aria-current="page" href="/combustivel/form"><i class="bi bi-fuel-pump-fill"></i> Combutível</a>
            </li>
            <li class="nav-item itens">
              <a class="nav-link active" aria-current="page" href="/fabricante/form"><i class="bi bi-buildings-fill"></i> Fabricante</a>
            </li>
            <li class="nav-item itens">
              <a class="nav-link active" aria-current="page" href="/marca/form"><i class="bi bi-tags-fill"></i> Marca</a>
            </li>
            <li class="nav-item itens">
              <a class="nav-link active" aria-current="page" href="/tipo-veiculo/form"><i class="bi bi-bus-front"></i> Tipo do Veículo</a>
            </li>
            <li class="nav-item itens">
              <a class="nav-link active" aria-current="page" href="/veiculo/form"><i class="bi bi-car-front-fill"></i> Veículo</a>
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
                <li><a class="dropdown-item" id="exportar" data-bs-toggle="modal" data-bs-target="#exampleModal">Exportar Banco de Dados</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal1">Importar Banco de Dados</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
</nav>

<!-- Modal -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Importar Dados</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="mb-3">
          <label for="formFile" class="form-label">Arquivo SQL</label>
          <input class="form-control" type="file" id="file">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="importar" class="btn btn-success">Importar</button>
      </div>
    </div>
  </div>
</div>

<script src="./../../View/js/jQuery/jquery-v3.7.0-min.js"></script>
<script src="./../../View/js/jquery.backup.js"></script>
