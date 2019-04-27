<?php include("../includes/config.php");
include("../includes/head-tags.php");
session_start();
include_once "../includes/top.php" ?>
<?php

if (isset($_SESSION["erroDaoProduto"])) {

    echo "<div class='alert alert-danger' role='alert'>";
    echo "<p>Erro cadastro DAO</p>";
    echo "<p>" . $_SESSION["erroDaoProduto"] . "</p>";
    echo "</div>";
    unset($_SESSION["erroDaoProduto"]);
} else if (isset($_SESSION["erroConexao"])) {

    echo "<div class='alert alert-danger' role='alert'>";
    echo "<p>Erro de conexão</p>";
    echo $_SESSION["erroConexao"];
    echo "</div>";
    unset($_SESSION["erroConexao"]);
} else if (isset($_SESSION["erroOpControle"])) {

    echo "<div class='alert alert-danger' role='alert'>";
    echo "<p>Operação inválida: Controle</p>";
    echo $_SESSION["erroOpControle"];
    echo "</div>";
    unset($_SESSION["erroOpControle"]);
} else if (isset($_SESSION["erroBuscaPorNomeControle"])) {

    echo "<div class='alert alert-danger' role='alert'>";
    echo "<p>Erro busca por parâmetro: Controle</p>";
    echo $_SESSION["erroBuscaPorNomeControle"];
    echo "</div>";
    unset($_SESSION["erroBuscaPorNomeControle"]);
}
echo "<div class='alert alert-danger' role='alert'>
                    <p>Acesso negado, retorne a <a href='index.php' class='btn btn-danger'>página inicial</a></p>  
                </div>";
include_once "../includes/bottom.php"
?>
