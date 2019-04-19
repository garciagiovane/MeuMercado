<?php session_start();
include "../includes/config.php";
header('Content-Type: text/html; charset=utf-8');
include "../includes/head-tags.php"; ?>
<body>
    <div class="container">
        <div class="jumbotron">
            <?php if (isset($_SESSION["usuarioLogado"])) {
                echo "<a href='../controller/controllerusuario.php?op=3' style='position: relative; float: right;' class='btn btn-danger btn-md'>Encerrar sessão</a>";
            } ?>
            <h1 class="display-4"><?php echo $h1; ?></h1>
            <p class="lead">Consulta de Produtos</p>
            <hr class="my-4">
            <form action="../controller/controller.php?op=3" method="POST">
                <div class="input-group mb-3">
                    <input type="text" autocomplete="off" class="form-control" id="pesquisarPorTipo1" name="pesquisarPorTipo1" placeholder="Pesquisar produto por nome" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="pesquisarPorNome" name="pesquisarPorNome">Pesquisar</button>
                    </div>
                </div>
            </form>
            <form action="../controller/controller.php?op=4" method="POST">
                <div class="input-group mb-3">
                    <input type="text" autocomplete="off" class="form-control" id="pesquisarPorTipo" name="pesquisarPorTipo" placeholder="Pesquisar produto por tipo" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-primary btn-lg" onclick="location.href='../controller/controller.php?op=2';">Atualizar</button>
            <button type="button" class="btn btn-info btn-lg" id="homePage" onclick="location.href='index.php';">Página Inicial</button>
            <hr class="my-4">
            <?php

            if (isset($_SESSION['sucessoExcluirNoControle'])) {
                echo "<div class='alert alert-primary' role='alert'>";
                echo "<p>" . $_SESSION['sucessoExcluirNoControle'] . "</p>";
                echo "</div>";
                unset($_SESSION["sucessoExcluirNoControle"]);
            } else if (isset($_SESSION["sucessoAlterarValorProduto"])) {
                echo "<div class='alert alert-primary' role='alert'>";
                echo "<p>" . $_SESSION["sucessoAlterarValorProduto"] . "</p>";
                echo "</div>";
                unset($_SESSION["sucessoAlterarValorProduto"]);
            }
            if (isset($_SESSION["produtosNoBanco"])) {
                $produtos = $_SESSION["produtosNoBanco"];

                echo "<table class='table table-hover table-striped'>";
                echo "<thead>";
                echo "<tr class='table-active'>";

                echo "<th scope='col'>Código produto</th>";
                echo "<th scope='col'>Nome Produto</th>";
                echo "<th scope='col'>Tipo produto</th>";
                echo "<th scope='col'>Valor Produto</th>";
                echo "<th scope='col'>Quantidade</th>";
                
                if (isset($_SESSION["usuarioLogado"])) {
                    echo "<th scope='col'>Excluir</th>";
                    echo "<th scope='col'>Alterar</th>";
                }
                
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($produtos as $prod) {
                    echo "<tr>";
                    echo "<td scope='row'>" . $prod["codigoProduto"] . "</td>";
                    echo "<td>" . $prod["nomeProduto"] . "</td>";
                    echo "<td>" . $prod["tipoProduto"] . "</td>";
                    echo "<td>" . $prod["valorProduto"] . "</td>";
                    echo "<td>" . $prod["qtdEstoque"] . "</td>";
                    
                    if (isset($_SESSION["usuarioLogado"])) {
                        echo "<td style='text-align: center;'><a title='Clique para excluir' style='color: red;' href='../controller/controller.php?op=5&codExclusao=" . $prod["codigoProduto"] . "'>X</a></td>";
                        echo "<td style='text-align: center;'><a title='Clique para excluir' style='color: red;' href='../controller/controller.php?op=8&codAlteracao=" . $prod["codigoProduto"] . "'>X</a></td>";
                    }
                    
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else if (isset($_SESSION["erroBuscarProdutosControle"])) {

                echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao buscarProdutos: Controle" . $_SESSION["erroBuscarProdutosControle"] . "</p>";
                echo "</div>";
            } else if (isset($_SESSION["erroBuscaPorNomeControle"])) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao buscarProdutos: Controle" . $_SESSION["erroBuscaPorNomeControle"] . "</p>";
                echo "</div>";
            } else if (isset($_SESSION["erroBuscarProdutosCase8"])) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao buscarProdutos: Controle" . $_SESSION["erroBuscarProdutosCase8"] . "</p>";
                echo "</div>";
            } else if (isset($_SESSION["erroAlterarValorProduto"])) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo $_SESSION["erroAlterarValorProduto"];
                echo "</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao buscarProdutos: consulta-produtos</p>";
                echo "</div>";
            }
            ?>


        </div>
    </div>
</body>