<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require '../model/conexaobanco.class.php';

class DaoProduto{
    private $conexao = null;
    
    public function __construct(){
        $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct(){
        $this->conexao = null;
        unset($this->conexao);
    }

    public static function cadastrarProduto(Produto $produto){
        try {
            $conexao = ConexaoBanco::getInstance();
            $sqlCadastro = $conexao->prepare("INSERT INTO produtos(codigoProduto, nomeProduto, tipoProduto, valorProduto, qtdEstoque, vendas, estoque_loja) VALUES (null, :nomeProduto, :tipoProduto, :valorProduto, :qtdEstoque, 0, :estoqueLoja)");
            $sqlCadastro->execute(array(
                'nomeProduto' => $produto->getNome(),
                'tipoProduto' => $produto->getTipo(),
                'valorProduto' => $produto->getValor(),
                'qtdEstoque' => $produto->getQuantidade(),
                'estoqueLoja' => $produto->getEstoqueLoja()
            ));

            $_SESSION["respostaCadastroOk"] = "Produto cadastrado!";
            $enviarParaResposta = "Location: ../view/cadastro-produtos.php";
            header($enviarParaResposta);
        } catch (PDOException $erro) {
            $_SESSION["erroDaoProduto"] = $erro->getMessage() . " Cadastrar produto";
            header("Location: ../view/resposta.php");
        }
    }

    public static function compararCodigoProduto($codigoProduto){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            //$sql = $conexao->prepare("SELECT codigoProduto FROM produtos WHERE codigoProduto = $codigoProduto");
            $sql = $conexao->prepare("SELECT codigoProduto FROM produtos WHERE codigoProduto = '$codigoProduto'");
            $sql->execute();
            $resultado = $sql->fetchAll();
            
            return $resultado;
            
        } catch (PDOException $erro) {
            $_SESSION["erroDaoProduto"] = $erro->getMessage() . " Comparar codigo";
            header("Location: ../view/resposta.php");
        }
        
    }

    public static function buscarProdutos(){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            $sql = $conexao->prepare("SELECT * FROM produtos");
            $sql->execute();
            $resultado = $sql->fetchAll();
            
            return $resultado;
        } catch (PDOException $erro) {
            $_SESSION["erroDaoProduto"] = $erro->getMessage() . " Buscar produto";
            header("Location: ../view/resposta.php");
        }        
    }

    public static function buscarProdutosPor($querySql){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            $sql = $conexao->prepare("SELECT * FROM produtos WHERE " . $querySql);
            $sql->execute();
            $resultado = $sql->fetchAll();
            
            return $resultado;
        } catch (PDOException $erro) {
            $_SESSION["erroDaoProduto"] = $erro->getMessage() . " Buscar produto parametro";
            header("Location: ../view/resposta.php");
        }        
    }

    public static function excluirProduto($codigoProduto){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            $sql = $conexao->prepare("DELETE FROM produtos WHERE codigoProduto=".$codigoProduto);
            $sql->execute();
            
            return true;
        } catch (PDOException $erro) {
            $_SESSION["erroDaoProduto"] = $erro->getMessage() . " Excluir produto";
            header("Location: ../view/resposta.php");
        }
    }

    public static function alterarProduto($codigoProduto, $novoValor, $novaQuantidade){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            $sql = $conexao->prepare("UPDATE produtos SET valorProduto = '$novoValor', qtdEstoque = '$novaQuantidade' WHERE codigoProduto = '$codigoProduto'");
            $sql->execute();
            
            return true;
        } catch (PDOException $erro) {
            $_SESSION["erroDaoProduto"] = $erro->getMessage() . " Alterar produto";
            header("Location: ../view/resposta.php");
        }
    }

    public function vender($codigoProduto){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            $sql = $conexao->prepare("UPDATE produtos SET vendas = vendas + 1, estoque_loja = estoque_loja - 1 WHERE codigoProduto = '$codigoProduto'");
            $sql->execute();
            
            return true;
        } catch (PDOException $erro) {
            $_SESSION["erroDaoProduto"] = $erro->getMessage() . " Vender";
            header("Location: ../view/resposta.php");
        }
    }
}
