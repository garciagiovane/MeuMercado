<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <div class="container">
        <form action="../controller/controller.php" method="post">

            <input type="number" name="codigoProduto" id="codigoProduto" placeholder="Digite aqui o código" >
            <input type="text" name="nomeProduto" id="nomeProduto" placeholder="Digite o nome do produto" >
            <input type="text" name="tipoProduto" id="tipoProduto" placeholder="Digite o tipo" >
            <input type="text" name="valorProduto" id="valorProduto" placeholder="Digite o valor" >
            <input type="number" name="quantidade" id="quantidade" >

            <input type="submit" name="enviarForm" id="enviarForm">
            

        </form>
=======
<?php require("../includes/config.php"); session_start(); header('Content-Type: text/html; charset=utf-8'); require("../includes/head-tags.php"); ?>
<body>
    <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">MeuMercado!</h1>
      <p class="lead">Cadastro de Produtos</p>
      <hr class="my-4">
      <form action="../controller/controller.php?op=1" method="post">
<!--
            <div class="form-group row">                
                <label for="codigoProduto" class="col-sm-2 col-form-label">Código do produto</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="codigoProduto" id="codigoProduto" placeholder="Digite aqui o código" autocomplete="off">
                </div>                
            </div>
-->
            <div class="form-group row">
                <label for="nomeProduto" class="col-sm-2 col-form-label">Nome do produto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Digite o nome do produto" autocomplete="off">
                </div>    
            </div>

            <div class="form-group row">
                <label for="tipoProduto" class="col-sm-2 col-form-label">Tipo do produto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tipoProduto" id="tipoProduto" placeholder="Digite o tipo" autocomplete="off">
                </div>    
            </div>
            
            <div class="form-group row">
                <label for="valorProduto" class="col-sm-2 col-form-label">Valor do produto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="valorProduto" id="valorProduto" placeholder="Digite o valor" autocomplete="off">
                </div>    
            </div>
            
            <div class="form-group row">
                <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="quantidade" id="quantidade" autocomplete="off" placeholder="Quantidade">
                </div>    
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <!-- <button type="button" class="btn btn-danger btn-lg">Limpar</button> -->
            <button type="button" class="btn btn-info btn-lg" id="homePage" onclick="location.href='index.php';">Página Inicial</button>
        </form>
        <?php 
        if(isset($_SESSION["erroCadastro"])){
            $respostaCadastro = unserialize($_SESSION["erroCadastro"]);
            echo "<hr class='my4'><div class='alert alert-warning' role='alert'>";

            foreach($respostaCadastro as $res){
                echo "<p>" . $res . "</p>";
            }

            echo "</div>";
            unset($_SESSION["erroCadastro"]);
        } else if(isset($_SESSION['respostaCadastroOk'])){

            echo "<hr class='my4'><div class='alert alert-primary' role='alert'>";
                echo $_SESSION["respostaCadastroOk"];
            echo "</div>";
            unset($_SESSION["respostaCadastroOk"]);

        }
        ?>
      
    </div>
        
>>>>>>> 9623e01d7980104ed8dfb243de0a4b3e45b89a14
    </div>
</body>
</html>