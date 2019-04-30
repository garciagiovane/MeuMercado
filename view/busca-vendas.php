<?php session_start();
include "../includes/config.php";
include "../includes/head-tags.php";
include_once "../includes/top.php";
include_once "../includes/modal_quantidade.php";
?>
<button type="button" class="btn btn-primary " onclick="location.href='../controller/controller.php?op=11';">Atualizar</button>
<button type="button" class="btn btn-info " id="homePage" onclick="location.href='index.php';">Página Inicial</button>
<hr class="my4">
<?php
if (isset($_SESSION["erroControle"])) {
    $errosEncontrados = unserialize($_SESSION["erroControle"]);
    echo "<div class='alert alert-danger role='alert'>";
    foreach ($errosEncontrados as $erros) {
        echo "<p>" . $erros . "</p>";
    }
    echo "</div>";
    unset($_SESSION["erroControle"]);
} else if(isset($_SESSION["sucessoControle"])){
    echo "<div class='alert alert-primary role='alert'>";
        echo "<p>" . $_SESSION["sucessoControle"] . "</p>";
    echo "</div>";
    unset($_SESSION["sucessoControle"]);
}
if (isset($_SESSION["vendas"])) {
    $produtos = $_SESSION["vendas"];
    echo "<div class='table-responsive'>";
    echo "<table class='table table-hover table-striped' id='dtHorizontalExample' cellspacing='0' width='100%' >";
    echo "<thead>";
    echo "<tr class='table-active'>";

    echo "<th class='th-sm' scope='col'>Código</th>";
    echo "<th scope='col'>Nome</th>";
    echo "<th scope='col'>Tipo</th>";
    echo "<th scope='col'>Valor</th>";
    echo "<th scope='col'>Estoque<br>entrada</th>";
    echo "<th scope='col'>Vendas</th>";
    echo "<th scope='col'>Estoque<br>loja</th>";
    echo "<th scope='col'>Cancelar venda</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($produtos as $prod) {
        echo "<tr>";
        echo "<td scope='row'>" . $prod["codigoProduto"] . "</td>";
        echo "<td>" . $prod["nomeProduto"] . "</td>";
        echo "<td>" . $prod["tipoProduto"] . "</td>";
        echo "<td>R$ " . number_format($prod["valorProduto"], 2, ",", ".") . "</td>";
        echo "<td>" . $prod["qtdEstoque"] . "</td>";
        echo "<td>";
        if ($prod["vendas"] == null) {
            echo 0;
        } else {
            echo $prod["vendas"];
        }
        echo "</td>";
        echo "<td>" . $prod["estoque_loja"] . "</td>";
        echo "<td style='text-align: center;'><a id='abrirModal' title='Clique para excluir venda' href='#' data-toggle='modal' data-target='#quantidade'><img src='../includes/assets/lixo.png' id='iconeExclusao' alt='link para cancelamento de vendas'></a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</table>";
}
?>

<?php
include_once "../includes/bottom.php";
