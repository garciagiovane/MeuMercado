<?php include "../includes/config.php";
include "../includes/head-tags.php"; session_start();?>

<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Meu mercatto</h1>
      <p class="lead">Faça login para continuar</p>
      <hr class="my-4">
      <form action="../controller/controllerusuario.php?op=2" method="POSt">
        <div class="form-group row">
          <label for="codigoUsuario" class="col-sm-2 col-form-label">Código</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="codigoUsuario" id="codigoUsuario" placeholder="Digite o código" autocomplete="off">
            <small class="form-text text-muted">Código informado na hora do cadastro</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="senhaLogin" class="col-sm-2 col-form-label">Senha</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="senha" name="senhaLogin" placeholder="Senha">
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Fazer Login</button>
        <button type="button" class="btn btn-info btn-lg" id="homePage" onclick="location.href='index.php';">Página Inicial</button>
      </form>
      <?php
      if (isset($_SESSION["erroCadastroUsuario"])) {
        $erros = unserialize($_SESSION["erroCadastroUsuario"]);
        echo "<hr class='my4'><div class='alert alert-warning' role='alert'>";
        foreach ($erros as $errosEncontrados) {
          echo "<p>" . $errosEncontrados . "</p>";
        }
        echo "</div>";
        unset($_SESSION["erroCadastroUsuario"]);
      }
      ?>
    </div>
  </div>
</body>