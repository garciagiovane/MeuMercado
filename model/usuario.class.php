<?php
class Usuario {
    private $codigo;
    private $nome;
    private $senha;
    private $cargo;
    
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

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getCargo(){
        return $this->cargo;
    }

    public function setCargo($cargo){
        $this->cargo = $cargo;
    }
}