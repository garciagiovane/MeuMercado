<?php
include '../utilities/validation.class.php';
include '../model/produto.class.php';

$validation = new Validation();


$idProduto = $_POST['codigoProduto'];
$nomeProduto = $_POST['nomeProduto'];
$tipoProduto = $_POST['tipoProduto'];
$valorProduto = $_POST['valorProduto'];
$quantidade = $_POST['quantidade'];

$produto = new Produto();







    /*
        echo "IdProduto: $idProduto";
        echo "<br>Nome: $nomeProduto";
        echo "<br>Tipo: $tipoProduto";
        echo "<br>Valor: $valorProduto";
        echo "<br>Quantidade: $quantidade";
    */

    $idProduto = $validation->validarCodigoProduto($_POST['codigoProduto']);
        
/*
require '../DAO/daousuario.class.php';
$usuarios = DaoUsuario::buscarTodos();
foreach ($usuarios as $user){
    echo "<tr>";
    echo "<td scope='row'>" . $user['codigoUsuario'] . "</td>";
    echo "<td>" . $user['nomeUsuario'] . "</td>";
    echo "<td>" . $user['cargo'] . "</td>";
    echo "</tr>";
}
*/
