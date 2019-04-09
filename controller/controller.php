<?php
include_once '../utilities/validation.class.php';
include_once '../model/produto.class.php';
include_once '../DAO/produtosDAO.class.php';

session_start();
$validation = new Validation();
$daoProduto = new DaoProduto();

if (isset($_GET["op"])) {
    $op = $_GET["op"];

    switch ($op) {
        case 1:
            $erros = array();

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
            break;
            case 2:
                $produtosNoBanco = $daoProduto->buscarProdutos();
                if (count($produtosNoBanco) > 0) {
                    $_SESSION["produtosNoBanco"] = $produtosNoBanco;
                    $location = "Location: ../view/consulta-produtos.php";
                    header($location);
                } else {
                    $_SESSION["erroBuscarProdutosControle"] = "Sem podutos cadastrados";
                    $location = "Location: ../view/consulta-produtos.php";
                    header($location);
                }
                break;
            case 3:
                if (!$validation->validarString($_POST["pesquisarPorNome"])) {
                    $_SESSION["erroBuscaPorNomeControle"] = "Pesquisa Inválida - Nome";
                    $location = "Location: ../view/resposta.php";
                    header($location);
                } else {
                    $pesq = $_POST["pesquisarPorNome"];
                    $querySql = "nomeProduto = '$pesq'";
                    $produtosNoBanco = $daoProduto->buscarProdutosPor($querySql);
                    $_SESSION["produtosNoBanco"] = $produtosNoBanco;
                    $location = "Location: ../view/consulta-produtos.php";
                    header($location);
                }
                break;
            case 4:
                if (!$validation->validarCodigoProduto($_POST['pesquisarPorCodigo'])) {
                    $_SESSION["erroBuscaPorNomeControle"] = "Pesquisa Inválida - Código ";
                    $location = "Location: ../view/resposta.php";
                    header($location);
                } else {
                    $pesq = $_POST["pesquisarPorCodigo"];
                    $querySql = "codigoProduto = $pesq";
                    //$querySql = "codigoProduto = " . $_POST["pesquisarPorCodigo"];
                    $produtosNoBanco = $daoProduto->buscarProdutosPor($querySql);
                    $_SESSION["produtosNoBanco"] = $produtosNoBanco;
                    $location = "Location: ../view/consulta-produtos.php";
                    header($location);
                }
                break;
        
        default:
            $_SESSION["erroOpControle"] = "Opção inválida";
            $location = "Location: ../view/resposta.php";
            header($location);
            break;
    }
} else {
    $_SESSION["erroOpControle"] = "Opção inválida";
    $location = "Location: ../view/resposta.php";
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
