<?php header('Content-Type: text/html; charset=utf-8');

include_once '../utilities/validation.class.php';
include_once '../model/produto.class.php';
include_once '../DAO/produtosDAO.class.php';

$validation = new Validation();
$daoProduto = new DaoProduto();

if (isset($_GET["op"])) {
    $op = $_GET["op"];

    switch ($op) {
        case 1:
            $erros = array();
            if (!$validation->validarString($_POST['nomeProduto'])) {
                $erros[] = 'Nome do produto inválido';
            }
            if (!$validation->validarString($_POST['tipoProduto'])) {
                $erros[] = 'Tipo produto inválido';
            }
            if (!$validation->validarValor(str_replace(",", ".", $_POST['valorProduto']))) {
                $erros[] = 'Valor inválido';
            }
            if (!$validation->validarQuantidade($_POST['quantidade'], $_POST['tipoProduto'])) {
                $erros[] = 'Quantidade inválida';
            }

            if (count($erros) == 0) {
                $produto = new Produto();

                $idProduto = $_POST['codigoProduto'];
                $nomeProduto = mb_strtolower($_POST['nomeProduto'], "UTF-8");
                $tipoProduto = mb_strtolower($_POST['tipoProduto'], "UTF-8");
                $valorProduto = str_replace(",", ".", $_POST['valorProduto']);
                $quantidade = $_POST['quantidade'];

                $produto->setCodigo($idProduto);
                $produto->setNome($nomeProduto);
                $produto->setTipo($tipoProduto);
                $produto->setValor($valorProduto);
                $produto->setQuantidade($quantidade);
                $produto->setEstoqueLoja($quantidade);

                $daoProduto->cadastrarProduto($produto);
            } else {
                $_SESSION["erroCadastro"] = serialize($erros);
                $location = "Location: ../view/cadastro-produtos.php";
                header($location);
            }
            break;
        case 2:
            $produtosNoBanco = $daoProduto->buscarProdutos();
            $location;
            if (count($produtosNoBanco) > 0) {
                $_SESSION["produtosNoBanco"] = $produtosNoBanco;
                if (isset($_GET["origem"])) {
                    if ($_GET["origem"] == "venda") {
                        $location = "Location: ../view/venda.php";
                    } else if ($_GET["origem"] == "consulta") {
                        $location = "Location: ../view/consulta-produtos.php";
                    }
                } else {
                    $location = "Location: ../view/venda.php";
                }
                header($location);
            } else {
                $_SESSION["erroBuscarProdutosControle"] = "Sem podutos cadastrados";
                $location = "Location: ../view/consulta-produtos.php";
                header($location);
            }
            break;
        case 3:
            if (!$validation->validarString($_POST['pesquisarPorTipo1'])) {
                $_SESSION["erroBuscaPorNomeControle"] = "Pesquisa Inválida - Nome: " . $_POST['pesquisarPorTipo1'];
                $location = "Location: ../view/resposta.php";
                header($location);
            } else {
                $pesq = $_POST["pesquisarPorTipo1"];
                $querySql = "nomeProduto LIKE '%" . $pesq . "%'";
                $produtosNoBanco = $daoProduto->buscarProdutosPor($querySql);
                $_SESSION["produtosNoBanco"] = $produtosNoBanco;
                if (isset($_GET["origem"])) {
                    if ($_GET["origem"] == "venda") {
                        $location = "Location: ../view/venda.php";
                    } else if ($_GET["origem"] == "consulta") {
                        $location = "Location: ../view/consulta-produtos.php";
                    }
                } else {
                    $location = "Location: ../view/venda.php";
                }
                header($location);
            }
            break;
        case 4:
            if (!$validation->validarString($_POST['pesquisarPorTipo'])) {
                $_SESSION["erroBuscaPorNomeControle"] = "Pesquisa Inválida - Tipo ";
                $location = "Location: ../view/resposta.php";
                header($location);
            } else {
                $pesq = $_POST["pesquisarPorTipo"];
                $querySql = "tipoProduto LIKE '%" . $pesq . "%'";
                $produtosNoBanco = $daoProduto->buscarProdutosPor($querySql);
                $_SESSION["produtosNoBanco"] = $produtosNoBanco;
                if (isset($_GET["origem"])) {
                    if ($_GET["origem"] == "venda") {
                        $location = "Location: ../view/venda.php";
                    } else if ($_GET["origem"] == "consulta") {
                        $location = "Location: ../view/consulta-produtos.php";
                    }
                } else {
                    $location = "Location: ../view/venda.php";
                }
                header($location);
            }
            break;
        case 5:
            if (!$validation->validarCodigoProduto($_GET['codExclusao'])) {
                $_SESSION["erroExcluirNoControle"] = "Código inválido - controle: código " . $_GET['codExclusao'];
                $location = "Location: ../view/excluir-produtos.php";
                header($location);
            } else {
                $daoProduto->excluirProduto($_GET['codExclusao']);
                $_SESSION["sucessoExcluirNoControle"] = "Produto excluído";
                $location = "Location: controller.php?op=2";
                header($location);
            }
            break;
        case 6:
            $produtosNoBanco = $daoProduto->buscarProdutos();
            if (count($produtosNoBanco) > 0) {
                $_SESSION["produtosNoBanco"] = $produtosNoBanco;
                $location = "Location: ../view/excluir-produtos.php";
                header($location);
            } else {
                $_SESSION["erroBuscarProdutosControle"] = "Sem podutos cadastrados";
                $location = "Location: ../view/consulta-produtos.php";
                header($location);
            }
            break;
        case 7:
            if (!$validation->validarQuantidade($_POST['quantidade'], $_POST['tipoProduto']) && !$validation->validarValor(str_replace(",", ".", $_POST['valorProduto'])) && $daoProduto->compararCodigoProduto($_POST["codigoProduto"])) {
                $_SESSION["erroAlterarValorProduto"] = "Erro ao alterar valor!";
                $location = "Location: ../view/consulta-produtos.php";
                header($location);
            } else if ($daoProduto->alterarProduto($_POST["codigoProduto"], str_replace(",", ".", $_POST['valorProduto']), $_POST["quantidade"])) {
                $_SESSION["sucessoAlterarValorProduto"] = "Produto alterado com sucesso!";
                $location = "Location: controller.php?op=2&origem=consulta";
                header($location);
            }
            break;
        case 8:
            if (!$validation->validarCodigoProduto($_GET["codAlteracao"])) {
                $_SESSION["erroBuscarProdutosCase8"] = "Código inválido!";
                $location = "Location: ../view/consulta-produtos.php";
                header($location);
            } else {
                $codParaAlteracao = $_GET["codAlteracao"];
                $querySql = "codigoProduto = '$codParaAlteracao'";
                $produtoNoBanco = $daoProduto->buscarProdutosPor($querySql);
                $_SESSION["produtoPorId"] = $produtoNoBanco;
                $location = "Location: ../view/alterar-produto.php";
                header($location);
            }
            break;
        case 9:
            $erros = array();
            if (!$validation->validarString($_POST["nomeUsuario"])) {
                $erros[] = "Nome inválido!";
            } else if ($_POST["senhaUsuario"] != $_POST["confirmarSenhaUsuario"]) {
                $erros[] = "Senha não confere";
            }
            break;
        case 10:
        $erros = array();
            if (!$validation->validarCodigoProduto($_POST["codigoProdutoCompra"])) {
                $erros[] = "Código inválido - 10!";
            }
            if (!$validation->validarQuantidade($_POST["quantidadeCompra"], $_POST["tipoProdutoCompra"])){
                $erros[] = "Quantidade inválida - 10!";
            }
            if(count($erros) > 0){
                $_SESSION["erroControle"] = serialize($erros);
                header("Location: ../view/venda.php");
            } else {
                $resposta = $daoProduto->vender($_POST["codigoProdutoCompra"], $_POST["quantidadeCompra"]);
                if($resposta){
                    $_SESSION["sucessoControle"] = "Venda efetuada!";
                    header("Location: controller.php?op=2?origem=venda");
                }else {
                    $_SESSION["erroControle"] = "Erro ao vender produto - 10!";
                    header("Location: ../view/venda.php");
                }
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
