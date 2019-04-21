<?php
class Produto{
    private $codigo;
    private $nome;
    private $tipo;
    private $valor;
    private $quantidade;
    private $estoqueLoja;

    public function __construct(){
        
    }

    public function __destruct(){
        unset($this->codigo);
        unset($this->nome);
        unset($this->tipo);
        unset($this->valor);
        unset($this->quantidade);
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function getEstoqueLoja(){
        return $this->estoqueLoja;
    }

    public function setEstoqueLoja($estoqueLoja){
        $this->estoqueLoja = $estoqueLoja;
    }

    public function __toString(){
        return nl2br("Codigo: $this->codigo
        Nome: $this->nome
        Tipo: $this->tipo
        Valor: $this->valor
        Quantidade: $this->quantidade
        Estoque Loja: $this->getEstoqueLoja");
    }
}