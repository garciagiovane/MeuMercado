<?php session_start(); include "../includes/config.php"; include "../includes/head-tags.php"; ?>

<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4"><?php echo $h1; ?></h1>
      <p class="lead"><?php echo $lead; ?></p>
      <hr class="my-4">
      <form action="../controller/controllerusuario.php?op=2<?php if(isset($_GET["return_url"])){echo "&return_url=" . $_GET["return_url"];}?>" method="POST" >
        <div class="form-group row">
          <label for="codigoUsuario" class="col-sm-2 col-form-label">Código</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="codigoUsuario" id="codigoUsuario" placeholder="Digite o código" autocomplete="off" required>
            <small class="form-text text-muted">Código informado na hora do cadastro</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="senhaLogin" class="col-sm-2 col-form-label">Senha</label>
          <div class="col-sm-10">
            <input type="password" minlength="8" class="form-control" id="senha" name="senhaLogin" placeholder="Senha" required autocomplete="off">
          </div>
        </div>
        <button type="submit" class="btn btn-primary ">Fazer Login</button>
        <button type="button" class="btn btn-info " id="homePage" onclick="location.href='index.php';">Página Inicial</button>
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
      } else if (isset($_SESSION["usuarioNaoEncontrado"])){
        echo "<hr class='my4'><div class='alert alert-warning' role='alert'>";
          echo $_SESSION["usuarioNaoEncontrado"];
        echo "</div>";
        unset($_SESSION["usuarioNaoEncontrado"]);
      }
      ?>
    </div>
  </div>
</body>