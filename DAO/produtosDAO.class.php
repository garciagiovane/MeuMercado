<?php
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
            $sqlCadastro = $conexao->prepare("INSERT INTO produtos(codigoProduto, nomeProduto, tipoProduto, valorProduto, qtdEstoque) VALUES (:idProduto, :nomeProduto, :tipoProduto, :valorProduto, :qtdEstoque)");
            $sqlCadastro->execute(array(
                ':idProduto' => $produto->getCodigo(),
                'nomeProduto' => $produto->getNome(),
                'tipoProduto' => $produto->getTipo(),
                'valorProduto' => $produto->getValor(),
                'qtdEstoque' => $produto->getQuantidade()
            ));

            $_SESSION["resposta"] = "Produto cadastrado!";
            $enviarParaResposta = "../view/resposta.php";
            header($enviarParaResposta);
        } catch (\Throwable $erro) {
            
            $_SESSION["resposta"]{0} = $erro->getMessage();
            $_SESSION["resposta"]{1} = $erro->getTrace();
            $enviarParaResposta = "../view/resposta.php";
            header($enviarParaResposta);
        }
    }
}
