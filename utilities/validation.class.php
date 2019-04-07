<?php
class Validation{
    public function validarCodigoProduto($codigoProduto){
        $contadorErros = 0;
        
        if(is_int($codigoProduto)) {
            return true;
        } elseif(is_string($codigoProduto) && $codigoProduto > 0) {
            
            return ctype_digit($codigoProduto);
        } else {
            return false;
        }       
    }

    public function validarString($nomeProduto){
        $regex = '/^[a-záàâãéèêíïóôõöúçñ ]+$/';
        return preg_match($regex, $nomeProduto);
    }

    public function validarQuantidade($quantidade, $tipo){
        $contadorErros = 0;
        if($tipo == "carne"){
            if(is_numeric($quantidade)){
                return true;
            }
        } else if ($tipo != "carne"){
            if(is_int($quantidade)) {
                return true;
            } elseif(is_string($quantidade) && $quantidade > 0) {
                return ctype_digit($quantidade);
            } else {
                return false;
            }   
        }
/*
        if (!validarCodigoProduto($quantidade) && $tipo != "carne") {         
            $contadorErros += 1;
        }
        
        if ($contadorErros > 0) {
            return false;
        } else {
            return true;
        }*/
    }

    public function validarValor($valor){
        if ($valor <= 0) {
            return false;
        } else {
            return true;
        }
    }
}