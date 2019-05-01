<?php namespace Padronizacao;
class Padronizacao {
    function padronizarValorParaOBanco($valorDoUsuario){
        $source = array('.', ',');
        $replace = array('', '.');
        return str_replace($source, $replace, $valorDoUsuario);
    }
    
    function transformar($textoParaMinusculo){
        return mb_strtolower($textoParaMinusculo, "UTF-8");
    }
}

