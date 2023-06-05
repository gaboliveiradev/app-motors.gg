<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../../../View/css/header.css">
  <link rel="stylesheet" href="./../../../View/css/global.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <?php include "./View/includes/css_config.php" ?>
  <?php include "./View/includes/js_config.php" ?>
  <title>Motors.GG - Cadastrar Veículo.</title>
</head>
<body class="color">
  <header>
    <?php include "./View/includes/header.php" ?>
  </header>

  <main>
    <section class="sc__form">
      <div class="header__form">
        <h1 class="text-center">Veículo</h1>
        <hr>
      </div>
      <div class="body__form">
        <form class="row g-3" id="formVeiculo">
          <div class="col-md-2">
            <label for="modelo" class="form-label">Modelo *</label>
            <input type="text" class="form-control" id="modelo">
          </div>
          <div class="col-md-2">
            <label for="ano" class="form-label">Ano *</label>
            <input type="text" class="form-control" id="ano">
          </div>
          <div class="col-md-2">
            <label for="cor" class="form-label">Cor *</label>
            <input type="text" class="form-control" id="cor">
          </div>
          <div class="col-md-2">
            <label for="chassi" class="form-label">N Chassi *</label>
            <input type="text" class="form-control" id="chassi">
          </div>
          <div class="col-md-2">
            <label for="placa" class="form-label">Placa *</label>
            <input type="text" class="form-control" id="placa">
          </div>
          <div class="col-md-2">
            <label for="quilometragem" class="form-label">Quilometragem *</label>
            <input type="text" class="form-control" id="quilometragem">
          </div>
          <div class="col-md-12">
            <label for="observacao" class="form-label">Observações</label>
            <textarea style="resize:none;" class="form-control" id="observacao" rows="3"></textarea>
          </div>
          <div class="col-md-3">
            <label for="placa" class="form-label">Combustível *</label>
            <select class="form-select" id="selectCombustivel" aria-label="Default select example">
              <option selected disabled>Escolha</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="placa" class="form-label">Fabricante *</label>
            <select class="form-select" id="selectFabricante" aria-label="Default select example">
              <option selected disabled>Escolha</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="placa" class="form-label">Marca *</label>
            <select class="form-select" id="selectMarca" aria-label="Default select example">
              <option selected disabled>Escolha</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="placa" class="form-label">Tipo do Veículo *</label>
            <select class="form-select" id="selectTipoVeiculo" aria-label="Default select example">
              <option selected disabled>Escolha</option>
            </select>
          </div>
          <div class="col-md-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="revisao">
            <label class="form-check-label" for="revisao">Revisão</label>
          </div>
          <div class="col-md-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="venda">
            <label class="form-check-label" for="venda">Venda</label>
          </div>
          <div class="col-md-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="aluguel">
            <label class="form-check-label" for="aluguel">Aluguel</label>
          </div>
          <div class="col-md-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="roubo_furto">
            <label class="form-check-label" for="roubo_furto">Roubo/Furto</label>
          </div>
          <div class="col-md-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="particular">
            <label class="form-check-label" for="particular">Particular</label>
          </div>
          <div class="col-md-2 form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="sinistrado">
            <label class="form-check-label" for="sinistrado">Sinistrado</label>
          </div>
          <div class="col-auto">
            <button type="submit" id="cadastrar" class="btn btn-primary mb-3" form="formVeiculo">Cadastrar</button>
            <button type="submit" id="atualizar" class="btn btn-primary mb-3" form="formVeiculo" style="display: none;">Atualizar</button>
          </div>
        </form>
      </div>
    </section>

    <section class="sc__table">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">MODELO</th>
            <th scope="col" class="text-center">ANO</th>
            <th scope="col" class="text-center">NUM CHASSI</th>
            <th scope="col" class="text-center">PLACA</th>
            <th scope="col" class="text-center">CADASTRADO EM</th>
            <th scope="col" class="text-center">ATUALIZADO EM</th>
            <th scope="col" class="text-center">OPERADOR</th>
            <th scope="col" colspan="2" class="text-center w-30">AÇÃO</th>
          </tr>
        </thead>
        <tbody id="body__table">
          
        </tbody>
      </table>
    </section>
  </main>

  <footer>
    <script src="./../../../View/js/jQuery/jquery-v3.7.0-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script src="./../../../View/js/src/src.maskedinput.js"></script>
    <script src="./../../../View/js/sweetalert/sweetalert-v11.7.5.js"></script>
    <script src="./../../../View/js/jquery.veiculo.js"></script>
  </footer>
</body>
</html>