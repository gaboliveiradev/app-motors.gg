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
  <title>Motors.GG - Cadastrar Combustível.</title>
</head>
<body class="color">
  <header>
    <?php include "./View/includes/header.php" ?>
  </header>

  <main>
    <section class="sc__form">
      <div class="header__form">
        <h1 class="text-center">Combustível</h1>
        <hr>
      </div>
      <div class="body__form">
        <form class="row g-3">
          <div class="mb-3 ipt" >
            <label for="exampleFormControlInput1" class="form-label">Nome do Combustível:</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Gasolina">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cadastrar</button>
          </div>
        </form>
      </div>
    </section>
  </main>

  <footer>
    <script src="./../../../View/js/sweetalert/sweetalert-v11.7.5.js"></script>
  </footer>
</body>
</html>