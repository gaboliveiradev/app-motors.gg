<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../../../View/modules/usuario/form_login.css">
  <link rel="shortcut icon" href="./../../../View/assets/favicon.png" type="image/x-icon">
  <?php include "./View/includes/css_config.php" ?>
  <?php include "./View/includes/js_config.php" ?>
  <title>Motors.GG - Logue em sua conta.</title>
</head>
<body>
    <main>
        <section class="sc-logo"></section>

        <section class="sc-form">
            <div class="modal-content rounded-4 shadow">
              <div class="modal-body p-5 pt-0">
                <form id="formLogin" method="POST">
                  <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control rounded-3" id="email" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input name="senha" type="password" class="form-control rounded-3" id="senha" placeholder="Password">
                    <label for="floatingPassword">Senha</label>
                  </div>
                  <div class="checkbox mb-3">
                    <p>
                        <label>
                            <input type="checkbox" checked="checked" id="remember" />
                            <span>Lembrar de mim</span>
                        </label>
                    </p>
                  </div>
                  <div class="footer-form">
                    <input class="w-100 mb-2 btn btn-lg rounded-3 btn-primary cor_btn" type="submit" form="formLogin" value="Entrar"/>
                    <a class="text-body-secondary">Esqueceu sua senha? Clique aqui.</a>
                  </div>
                </form>
              </div>
            </div>
        </section>
    </main>
    

    <footer>
      <script src="./../../../View/js/jQuery/jquery-v3.7.0-min.js"></script>
      <script src="./../../../View/js/sweetalert/sweetalert-v11.7.5.js"></script>
      <script src="./../../../View/js/jquery.usuario.js"></script>
    </footer>
</body>
</html>