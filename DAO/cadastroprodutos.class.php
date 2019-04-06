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

    public static function cadastrarProduto($produto){
        try {
            $instance = ConexaoBanco::$instance();
            $sqlCadastro = $instance->prepare("INSERT INTO produtos(codigoProduto, nomeProduto, tipoProduto, valorProduto, qtdEstoque) VALUES (:idProduto, :nomeProduto, :tipoProduto, :valorProduto, :qtdEstoque)");
            $sqlCadastro->execute(array(
                'codigoProduto' => $produto->codigo, 
                'nomeProduto' => $produto->nome,
                'tipoProduto' => $produto->tipo,
                'valorProduto' => $produto->valor,
                'qtdEstoque' => $produto->quantidade
            ));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
