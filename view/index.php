<?php include("../includes/config.php");
session_start();
header('Content-Type: text/html; charset=utf-8');
include("../includes/head-tags.php"); ?>

<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4"><?php echo $h1; ?></h1>
      <p class="lead">Escolha a opção desejada.</p>
      <hr class="my-4">

      <div class="list-group">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="list-group-item list-group-item-light" href="../controller/controller.php?op=2">Consultar Produtos</a>
          </li>
          <?php if (isset($_SESSION["usuarioLogado"])) {
            echo "<li class='nav-item'>
              <a class='list-group-item list-group-item-light' href='cadastro-produtos.php'>Cadastrar Produtos</a>
            </li>          
            <li class='nav-item'>
              <a class='list-group-item list-group-item-light' href='cadastro-usuario.php'>Cadastrar funcionário</a>
            </li>";
          } 
          if (!isset($_SESSION["usuarioLogado"])){
            echo "<li class='nav-item'>
              <a class='list-group-item list-group-item-light' href='login.php'>Fazer login</a>
            </li>";
          }
          if (isset($_SESSION["usuarioLogado"])) {
            $codigo = $_SESSION["usuarioLogado"][3];
            if ($codigo == 1000) {
              echo "<li class='nav-item'>
                      <a class='list-group-item list-group-item-light' href='../controller/controllerusuario.php?op=4'>Editar Usuários</a>
                    </li>";
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</body>

</html>