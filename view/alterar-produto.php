<?php require("../includes/config.php"); session_start(); header('Content-Type: text/html; charset=utf-8');?>
<head>
    <?php require("../includes/head-tags.php"); ?>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">MeuMercado!</h1>
            <p class="lead">Alteração de Produto</p>
            <hr class="my-4">

            <?php
            if (isset($_SESSION["produtoPorId"])) {
                $produto = $_SESSION["produtoPorId"];

                $codigo;
                $nome;
                $tipo;
                $valor;
                $quantidade;
                foreach ($produto as $prodEncontrado) {
                    $codigo = $prodEncontrado["codigoProduto"];
                    $nome = $prodEncontrado["nomeProduto"];
                    $tipo = $prodEncontrado["tipoProduto"];
                    $valor = $prodEncontrado["valorProduto"];
                    $quantidade = $prodEncontrado["qtdEstoque"];
                }
                unset($_SESSION["produtoPorId"]);
            } else {
                header("Location: consulta-produtos.php");
            }
            ?>
            <form action="../controller/controller.php?op=7" method="post">
            
                <div class="form-group row">
                    <label for="codigoProduto" class="col-sm-2 col-form-label">Código do produto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="codigoProduto" id="codigoProduto" value="<?php echo $codigo ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomeProduto" class="col-sm-2 col-form-label">Nome do produto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" value="<?php echo $nome ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipoProduto" class="col-sm-2 col-form-label">Tipo do produto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tipoProduto" id="tipoProduto" value="<?php echo $tipo ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="valorProduto" class="col-sm-2 col-form-label">Valor do produto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="valorProduto" id="valorProduto" value="<?php echo $valor ?>" autocomplete="off">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="quantidade" id="quantidade" autocomplete="off" value="<?php echo $quantidade ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Alterar</button>
                <button type="button" class="btn btn-info btn-lg" id="homePage" onclick="location.href='index.php';">Página Inicial</button>
            </form>
        </div>
    </div>
</body>