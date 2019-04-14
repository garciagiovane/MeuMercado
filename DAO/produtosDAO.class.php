<?php
require '../model/conexaobanco.class.php';
session_start();
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
            $sqlCadastro = $conexao->prepare("INSERT INTO produtos(codigoProduto, nomeProduto, tipoProduto, valorProduto, qtdEstoque) VALUES (:idProduto, :nomeProduto, :tipoProduto, :valorProduto, :qtdEstoque)");
            $sqlCadastro->execute(array(
                ':idProduto' => $produto->getCodigo(),
                'nomeProduto' => $produto->getNome(),
                'tipoProduto' => $produto->getTipo(),
                'valorProduto' => $produto->getValor(),
                'qtdEstoque' => $produto->getQuantidade()
            ));

            $_SESSION["respostaCadastroOk"] = "Produto cadastrado!";
            $enviarParaResposta = "Location: ../view/cadastro-produtos.php";
            header($enviarParaResposta);
        } catch (\Throwable $erro) {
            
            $_SESSION["erroCadastroDAO"] = $erro->getMessage();
            $enviarParaResposta = "Location: ../view/resposta.php";
            header($enviarParaResposta);
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
            
        } catch (\Throwable $erro) {
            $_SESSION["erroComparaCodigo"] = $erro->getMessage();
            $enviarParaResposta = "Location: ../view/resposta.php";
            header($enviarParaResposta);
        }
        
    }

    public static function buscarProdutos(){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            $sql = $conexao->prepare("SELECT * FROM produtos");
            $sql->execute();
            $resultado = $sql->fetchAll();
            
            return $resultado;
        } catch (\Throwable $erro) {
            $_SESSION["erroBuscarProduto"] = $erro->getMessage();
            $location = "Location: ../view/resposta.php";
            header($location);
        }        
    }

    public static function buscarProdutosPor($querySql){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            $sql = $conexao->prepare("SELECT * FROM produtos WHERE " . $querySql);
            $sql->execute();
            $resultado = $sql->fetchAll();
            
            return $resultado;
        } catch (\Throwable $erro) {
            $_SESSION["erroBuscarProduto"] = $erro->getMessage();
            $location = "Location: ../view/resposta.php";
            header($location);
        }        
    }

    public static function excluirProduto($codigoProduto){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            $sql = $conexao->prepare("DELETE FROM produtos WHERE codigoProduto=".$codigoProduto);
            $sql->execute();
            $resultado = $sql->fetchAll();
            
            return $resultado;
        } catch (\Throwable $erro) {
            $_SESSION["erroExcluirProduto"] = $erro->getMessage();
            $location = "Location: ../view/resposta.php";
            header($location);
        }
    }

    public static function alterarProduto($codigoProduto, $novoValor, $novaQuantidade){
        try {
            $conexao = ConexaoBanco::getInstance();
            
            $sql = $conexao->prepare("UPDATE produtos SET valorProduto = '$novoValor', qtdEstoque = '$novaQuantidade' WHERE codigoProduto = '$codigoProduto'");
            $sql->execute();
            
            return true;
        } catch (\Throwable $erro) {
            $_SESSION["erroAlterarValorProduto"] = $erro->getMessage();
            $location = "Location: ../view/alterarProduto.php";
            header($location);
        }
    }
}
