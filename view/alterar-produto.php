<?php session_start();
include "../includes/config.php";
header('Content-Type: text/html; charset=utf-8');
include "../includes/head-tags.php"; ?>

<body>
    <div class="container">
        <a href='../controller/controllerusuario.php?op=3' style='position: relative; float: right;' class='btn btn-danger btn-md'>Encerrar sessão</a>
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $h1; ?></h1>
            <p class="lead"><?php echo $lead; ?></p>
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
                    $valor =  number_format($prodEncontrado["valorProduto"], 2, ",", ".");
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
                        <input type="text" class="form-control valorProduto" name="valorProduto" id="valorProduto" value="<?php echo $valor ?>" autocomplete="off">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="quantidade" id="quantidade" autocomplete="off" value="<?php echo $quantidade ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ">Alterar</button>
                <button type="button" class="btn btn-info " id="homePage" onclick="location.href='index.php';">Página Inicial</button>
            </form>
        </div>
    </div>
</body>
