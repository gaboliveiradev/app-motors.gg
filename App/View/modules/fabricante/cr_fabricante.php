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
  <title>Motors.GG - Cadastrar Fabricante.</title>
</head>
<body class="color">
  <header>
    <?php include "./View/includes/header.php" ?>
  </header>

  <main>
    <section class="sc__form">
      <div class="header__form">
        <h1 class="text-center">Fabricante</h1>
        <hr>
      </div>
      <div class="body__form">
        <form class="row g-3" id="formFabricante">
          <div class="mb-3 ipt" >
            <label for="exampleFormControlInput1" class="form-label">Nome do Fabricante:</label>
            <input id="fabricante" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Toyota">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3" form="formFabricante">Cadastrar</button>
          </div>
        </form>
      </div>
    </section>

    <section class="sc__table">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">NOME</th>
            <th scope="col" class="text-center">OPERADOR</th>
            <th scope="col" class="text-center">CADASTRADO EM</th>
            <th scope="col" class="text-center">ATUALIZADO EM</th>
            <th scope="col" colspan="2" class="text-center w-30">AÇÃO</th>
          </tr>
        </thead>
        <tbody id="body__table">
          
        </tbody>
      </table>
    </section>
  </main>

  <footer>
    <script src="./../../../View/js/sweetalert/sweetalert-v11.7.5.js"></script>
    <script src="./../../../View/js/jquery.fabricante.js"></script>
  </footer>
</body>
</html>