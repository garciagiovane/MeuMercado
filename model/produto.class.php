<?php
class Produto{
    private $codigo;
    private $nome;
    private $tipo;
    private $valor;
    private $quantidade;

    public function __construct(){
        
    }

    public function __destruct(){
        unset($this->codigo);
        unset($this->nome);
        unset($this->tipo);
        unset($this->valor);
        unset($this->quantidade);
    }

    public function __get($a){
        return $this->$a;
    }

    public function __set($a, $v){
        $this->$a = $v;
    }

    public function __toString(){
        return nl2br("Codigo: $this->codigo
        Nome: $this->nome
        Tipo: $this->tipo
        Valor: $this->valor
        Quantidade: $this->quantidade");
    }
}