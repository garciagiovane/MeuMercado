<?php
include_once '../utilities/validation.class.php';
include_once '../model/produto.class.php';
include_once '../DAO/produtosDAO.class.php';

session_start();
$validation = new Validation();
$daoProduto = new DaoProduto();
$erros = array();


/*if (!$validation->verificarCodigoBanco($_POST['codigoProduto'])) {
    $erros[] = 'Código já está cadastrado';
}*/ 
if ( count($daoProduto->compararCodigoProduto($_POST['codigoProduto'])) > 0) {
    $erros[] = 'Código já está cadastrado';
}
if (!$validation->validarCodigoProduto($_POST['codigoProduto'])) {
    $erros[] = 'Código inválido';
} 
if (!$validation->validarString( $_POST['nomeProduto'])) {
    $erros[] = 'Nome do produto inválido';
}
if (!$validation->validarString( strtolower($_POST['tipoProduto']))) {
    $erros[] = 'Tipo produto inválido';
}
if(!$validation->validarValor($_POST['valorProduto'])){
    $erros[] = 'Valor inválido';
}
if (!$validation->validarQuantidade($_POST['quantidade'], $_POST['tipoProduto'])) {
    $erros[] = 'Quantidade inválida';
}

if (count($erros) == 0) {
    $produto = new Produto();
    //$daoProduto = new DaoProduto();

    $idProduto = $_POST['codigoProduto'];
    $nomeProduto = strtolower($_POST['nomeProduto']);
    $tipoProduto = $_POST['tipoProduto'];
    $valorProduto = str_replace(",", ".",$_POST['valorProduto']) ;
    $quantidade = $_POST['quantidade'];

    $produto->setCodigo($idProduto);
    $produto->setNome($nomeProduto);
    $produto->setTipo($tipoProduto);
    $produto->setValor($valorProduto);
    $produto->setQuantidade($quantidade);
    
    $daoProduto->cadastrarProduto($produto); 
    
} else {
    $_SESSION["erroCadastro"] = serialize($erros);
    $location = "Location: ../view/cadastro-produtos.php";
    header($location);
}


    /*
        echo "IdProduto: $idProduto";
        echo "<br>Nome: $nomeProduto";
        echo "<br>Tipo: $tipoProduto";
        echo "<br>Valor: $valorProduto";
        echo "<br>Quantidade: $quantidade";
    */

    
        
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
