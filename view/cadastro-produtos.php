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
            <form action="../controller/controller.php?op=1" method="post">
                <div class="form-group row">
                    <label for="nomeProduto" class="col-sm-2 col-form-label">Nome do produto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Digite o nome do produto" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipoProduto" class="col-sm-2 col-form-label">Tipo do produto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tipoProduto" id="tipoProduto" placeholder="Digite o tipo" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="valorProduto" class="col-sm-2 col-form-label">Valor do produto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control valorProduto" name="valorProduto" id="valorProduto" placeholder="Digite o valor" autocomplete="off" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="quantidade" id="quantidade" autocomplete="off" placeholder="Quantidade" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ">Cadastrar</button>
                <button type="button" class="btn btn-info " id="homePage" onclick="location.href='index.php';">Página Inicial</button>
            </form>
            <?php
            if (isset($_SESSION["erroCadastro"])) {
                $respostaCadastro = unserialize($_SESSION["erroCadastro"]);
                echo "<hr class='my4'><div class='alert alert-warning' role='alert'>";

                foreach ($respostaCadastro as $res) {
                    echo "<p>" . $res . "</p>";
                }

                echo "</div>";
                unset($_SESSION["erroCadastro"]);
            } else if (isset($_SESSION['respostaCadastroOk'])) {

                echo "<hr class='my4'><div class='alert alert-primary' role='alert'>";
                echo $_SESSION["respostaCadastroOk"];
                echo "</div>";
                unset($_SESSION["respostaCadastroOk"]);
            }
            ?>

        </div>

    </div>
</body>

</html>