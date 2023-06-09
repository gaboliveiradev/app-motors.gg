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
  <title>Motors.GG - Dashboard.</title>
</head>
<body class="color">
  <header>
    <?php include "./View/includes/header.php" ?>
  </header>

  <main>
    <h1>Bem Vindo (a) <?= $_SESSION["motorsgg_logged"][0]->nome ?></h1>
  </main>
</body>
</html>