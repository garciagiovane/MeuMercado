<?php include("../includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../includes/head-tags.php"); ?>
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">MeuMercado!</h1>
      <p class="lead">Escolha a opção desejada.</p>
      <hr class="my-4">
      
      <div class="list-group">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="list-group-item list-group-item-light" href="cadastro-produtos.php">Cadastrar Produtos</a>
          </li>
          <li class="nav-item">
            <a class="list-group-item list-group-item-light" href="../controller/controller.php?op=2">Consultar Produtos</a> 
          </li>
          <li class="nav-item">
            <a class="list-group-item list-group-item-light" href="excluir-produtos.php">Excluir Produtos</a>
          </li>
        </ul>
      </div>
    </div>
  </div>    
</body>
</html>

