<?php session_start();
include("../includes/config.php");
header('Content-Type: text/html; charset=utf-8');
include("../includes/head-tags.php");
include_once "../includes/top.php";
?>
<div class="list-group">
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="list-group-item list-group-item-light" href="../controller/controller.php?op=2&origem=venda">Comprar</a>
    </li>
    <?php if (isset($_SESSION["usuarioLogado"])) {
      echo "<li class='nav-item'>
              <a class='list-group-item list-group-item-light' href='cadastro-produtos.php'>Cadastrar produtos</a>
            </li>          
            <li class='nav-item'>
              <a class='list-group-item list-group-item-light' href='cadastro-usuario.php'>Cadastrar funcionário</a>
            </li>
            <li class='nav-item'>
              <a class='list-group-item list-group-item-light' href='../controller/controller.php?op=9'>Consultar Estoque</a>
            </li>
            <li class='nav-item'>
              <a class='list-group-item list-group-item-light' href='../controller/controller.php?op=11'>Consultar Vendas</a>
            </li>         
            ";
    }
    if (!isset($_SESSION["usuarioLogado"])) {
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
<?php include_once "../includes/bottom.php"; ?>
