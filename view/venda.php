<?php session_start();
include "../includes/config.php";
include "../includes/head-tags.php";
include "../includes/top.php";
include_once "../includes/modal_quantidade.php";
?>
<!-- Code below here -->
<form action="../controller/controller.php?op=3&origem=venda" method="POST">
    <span class="badge badge-primary">Mínimo 3 caracteres</span>
    <div class="input-group mb-3">        
        <input type="text" autocomplete="off" class="form-control" id="pesquisarPorTipo1" name="pesquisaPorNome" placeholder="Pesquisar produto por nome" aria-label="Recipient's username" aria-describedby="button-addon2">
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

<div class="popup"></div>
<hr class="my-4">
<?php
if (isset($_SESSION["erroBuscaPorNomeControle"])) {
    echo "<div class='alert alert-danger' role='alert'>";
    echo "<p>" . $_SESSION["erroBuscaPorNomeControle"] . "</p>";
    echo "</div>";
    unset($_SESSION["erroBuscaPorNomeControle"]);
} else if (isset($_SESSION["erroBuscarProdutosCase8"])) {
    echo "<div class='alert alert-danger' role='alert'>";
    echo "<p>Erro ao buscarProdutos: Controle" . $_SESSION["erroBuscarProdutosCase8"] . "</p>";
    echo "</div>";
    unset($_SESSION["erroBuscarProdutosCase8"]);
} else if (isset($_SESSION["erroControle"])) {
    $erros = unserialize($_SESSION["erroControle"]);
    echo "<div class='alert alert-primary' role='alert'>";
    foreach ($erros as $erro) {
        echo "<p>" . $erro . "</p>";
    }
    echo "</div>";
    unset($_SESSION["erroControle"]);
} else if (isset($_SESSION["sucessoControle"])) {
    echo "<div class='alert alert-primary' role='alert'>";
    echo $_SESSION["sucessoControle"];
    echo "</div>";
    unset($_SESSION["sucessoControle"]);
} else {
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
            echo "<td hidden>" . $prod["codigoProduto"] . "</td>";
            echo "<td>" . $prod["nomeProduto"] . "</td>";
            echo "<td>" . $prod["tipoProduto"] . "</td>";
            echo "<td>R$ " . number_format($prod["valorProduto"], 2, ",", ".") . "</td>";
            echo "<td><a href='#' id='abrirModal' data-toggle='modal' data-target='#quantidade'><img src='../includes/assets/carrinho.png' id='iconeCompra' alt='link para comprar produtos'></a></td>";

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
    }
}
?>
<!-- Code above here -->
<?php
include "../includes/bottom.php";
