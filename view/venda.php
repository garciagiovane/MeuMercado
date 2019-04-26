<?php session_start();
include "../includes/config.php";
include "../includes/head-tags.php";
include "../includes/top.php";
?>
<!-- Code below here -->
<form action="../controller/controller.php?op=3&origem=venda" method="POST">
                <div class="input-group mb-3">
                    <input type="text" autocomplete="off" class="form-control" id="pesquisarPorTipo1" name="pesquisarPorTipo1" placeholder="Pesquisar produto por nome" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="pesquisarPorNome" name="pesquisarPorNome">Pesquisar</button>
                    </div>
                </div>
            </form>
            <form action="../controller/controller.php?op=4&origem=venda" method="POST">
                <div class="input-group mb-3">
                    <input type="text" autocomplete="off" class="form-control" id="pesquisarPorTipo" name="pesquisarPorTipo" placeholder="Pesquisar produto por tipo" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-primary " onclick="location.href='../controller/controller.php?op=2&origem=venda';">Atualizar</button>
            <button type="button" class="btn btn-info " id="homePage" onclick="location.href='index.php';">Página Inicial</button>
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
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover table-striped' id='dtHorizontalExample' cellspacing='0' width='100%' >";
                echo "<thead>";
                echo "<tr class='table-active'>";

                echo "<th scope='col'>Nome</th>";
                echo "<th scope='col'>Tipo</th>";
                echo "<th scope='col'>Valor</th>";                
                echo "<th scope='col'>Comprar</th>";

                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($produtos as $prod) {
                    echo "<tr>";
                    echo "<td>" . $prod["nomeProduto"] . "</td>";
                    echo "<td>" . $prod["tipoProduto"] . "</td>";
                    echo "<td>R$ " . number_format($prod["valorProduto"], 2, ",", ".") . "</td>";
                    echo "<td ><a title='Clique para comprar' href='../controller/controller.php?op=10&codProdutoVendido=" . $prod["codigoProduto"] . "'><img src='../includes/assets/carrinho.png' id='iconeCompra' alt='link para exclusão de produtos'></a></td>";

                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</table>";
            } else if (isset($_SESSION["erroBuscarProdutosControle"])) {

                echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao buscarProdutos: Controle" . $_SESSION["erroBuscarProdutosControle"] . "</p>";
                echo "</div>";
                unset($_SESSION["erroBuscarProdutosControle"]);
            } else if (isset($_SESSION["erroBuscaPorNomeControle"])) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao buscarProdutos: Controle" . $_SESSION["erroBuscaPorNomeControle"] . "</p>";
                echo "</div>";
                unset($_SESSION["erroBuscaPorNomeControle"]);
            } else if (isset($_SESSION["erroBuscarProdutosCase8"])) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao buscarProdutos: Controle" . $_SESSION["erroBuscarProdutosCase8"] . "</p>";
                echo "</div>";
                unset($_SESSION["erroBuscarProdutosCase8"]);
            } else if (isset($_SESSION["erroControle"])) {
                echo "<div class='alert alert-danger' role='alert'>";
                echo $_SESSION["erroControle"];
                echo "</div>";
                unset($_SESSION["erroControle"]);
            } else if(isset($_SESSION["sucessoControle"])){
                echo "<div class='alert alert-info' role='alert'>";
                echo $_SESSION["sucessoControle"];
                echo "</div>";
                unset($_SESSION["sucessoControle"]);
                
            } else {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao buscarProdutos: consulta-produtos</p>";
                echo "</div>";
            }
            ?>
<!-- Code above here -->
<?php
include "../includes/bottom.php";