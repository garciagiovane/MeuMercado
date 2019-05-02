<?php
use Padronizacao\Padronizacao;

header('Content-Type: text/html; charset=utf-8');
include_once '../utilities/padronizacao.php';
include_once '../utilities/validation.class.php';
include_once '../model/produto.class.php';
include_once '../DAO/produtosDAO.class.php';

$validation = new Validation();
$daoProduto = new DaoProduto();
$padrao = new Padronizacao;

if (isset($_GET["op"])) {
    $op = $_GET["op"];

    switch ($op) {
        case 1:
            $erros = array();
            if (!$validation->validarNomeProduto($_POST['nomeProduto'])) {
                $erros[] = 'Nome do produto inválido';
            }
            if (!$validation->validarString($_POST['tipoProduto'])) {
                $erros[] = 'Tipo produto inválido';
            }
            if (!$validation->validarValor(str_replace(",", ".", $_POST['valorProduto']))) {
                $erros[] = 'Valor inválido';
            }
            if (!$validation->validarQuantidade(str_replace(",", ".", $_POST['quantidade']), $_POST['tipoProduto'])) {
                $erros[] = 'Quantidade inválida';
            }

            if (count($erros) == 0) {
                $produto = new Produto();

                $nomeProduto = $padrao->transformar($_POST['nomeProduto']);
                $tipoProduto = $padrao->transformar($_POST['tipoProduto']);
                $valorProduto = $padrao->padronizarValorParaOBanco($_POST["valorProduto"]);
                $quantidade = $_POST['quantidade'];

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
            $nomePadronizado = $padrao->transformar($_POST['pesquisaPorNome']);
            if (!$validation->validarNomeProduto($nomePadronizado)) {
            //if (!$validation->validarString($nomePadronizado)) {
                $_SESSION["erroBuscaPorNomeControle"] = "Nenhum produto encontrado ou pesquisa curta demais";
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
                $pesq = $nomePadronizado;
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
            $stringPadronizada = $padrao->transformar($_POST['pesquisarPorTipo']);
            if (!$validation->validarString($stringPadronizada)) {
                $_SESSION["erroBuscaPorNomeControle"] = "Desculpe, não encontramos nenhum produto";
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
                $pesq = $stringPadronizada;
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
                $location = "Location: controller.php?op=9";
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
            $contador;
            if (!$validation->validarQuantidade($_POST['quantidade'], $_POST['tipoProduto'])) {
                $contador += 1;
            }
            if (!$validation->validarValor(str_replace(",", ".", $_POST['valorProduto']))) {
                $contador += 1;
            }
            if (!$daoProduto->compararCodigoProduto($_POST["codigoProduto"])) {
                $contador += 1;
            }
            if ($contador > 0) {
                $_SESSION["erroAlterarValorProduto"] = "Erro ao alterar produto!";
                $location = "Location: ../view/consulta-produtos.php";
                header($location);
            } else if ($daoProduto->alterarProduto($_POST["codigoProduto"], $padrao->padronizarValorParaOBanco($_POST['valorProduto']), $_POST["quantidade"])) {
                $_SESSION["sucessoAlterarValorProduto"] = "Produto alterado com sucesso!";
                $location = "Location: controller.php?op=9";
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
            if (!isset($_GET["estoque"])) {
                $_SESSION["produtosEstoque"] = $daoProduto->buscarProdutos();
            }
            $estoque = $_GET["estoque"];
            if ($estoque != "positivo" && $estoque != "negativo" && $estoque != "zerado") {
                $_SESSION["produtosEstoque"] = $daoProduto->buscarProdutos();
            } else {
                $estoque = $_GET["estoque"];
                $parametroPesquisa;
                if ($estoque == "positivo") {
                    $parametroPesquisa = "estoque_loja > 0";
                }
                if ($estoque == "negativo") {
                    $parametroPesquisa = "estoque_loja < 0";
                }
                if ($estoque == "zerado") {
                    $parametroPesquisa = "estoque_loja = 0";
                }
                $_SESSION["produtosEstoque"] = $daoProduto->buscarProdutosPor($parametroPesquisa);
            }
            header("Location: ../view/consulta-produtos.php");
            break;
        case 10:
            $erros = array();
            if (!$validation->validarCodigoProduto($_POST["codigoProdutoCompra"])) {
                $erros[] = "Código inválido - 10!";
            }
            if (!$validation->validarQuantidade($_POST["quantidadeCompra"], $_POST["tipoProdutoCompra"])) {
                $erros[] = "Quantidade inválida - 10!";
            }
            if (count($erros) > 0) {
                $_SESSION["erroControle"] = serialize($erros);
                header("Location: ../view/venda.php");
            } else {
                $resposta = $daoProduto->vender($_POST["codigoProdutoCompra"], $_POST["quantidadeCompra"]);
                if ($resposta) {
                    $_SESSION["sucessoControle"] = "Compra efetuada!";
                    header("Location: controller.php?op=2?origem=venda");
                } else {
                    $_SESSION["erroControle"] = "Erro ao vender produto - 10!";
                    header("Location: ../view/venda.php");
                }
            }
            break;
        case 11:
            $erros = array();
            $querySql = "vendas > 0";
            $produtosEncontrados = $daoProduto->buscarProdutosPor($querySql);
            if (count($produtosEncontrados) > 0) {
                $_SESSION["vendas"] = $produtosEncontrados;
                header("Location: ../view/busca-vendas.php");
            } else {
                $_SESSION["erroControle"] = "Erro ao buscar vendas";
                header("Location: ../view/busca-vendas.php");
            }
            break;
        case 12:
            $erros = array();
            if (!$validation->validarCodigoProduto($_POST["codigoProdutoCompra"])) {
                $erros[] = "Código inválido - 10!";
            }
            if (!$validation->validarQuantidade($_POST["quantidadeCompra"], $_POST["tipoProdutoCompra"])) {
                $erros[] = "Quantidade inválida - 10!";
            }
            if ($_POST["quantidadeCompra"] > $_POST["qtdJaVendida"]) {
                $erros[] = "Venda não pode ficar negativa";
            }
            if (count($erros) > 0) {
                $_SESSION["erroControle"] = serialize($erros);
                header("Location: ../view/busca-vendas.php");
            } else {
                $resposta = $daoProduto->excluirVenda($_POST["codigoProdutoCompra"], $_POST["quantidadeCompra"]);
                if ($resposta) {
                    $_SESSION["sucessoControle"] = "Venda excluida com sucesso!";
                    header("Location: controller.php?op=11");
                } else {
                    $_SESSION["erroControle"] = "Erro ao excluir venda - 10!";
                    header("Location: ../view/busca-vendas.php");
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
