<?php namespace Padronizacao;
function padronizarValorParaOBanco($valorDoUsuario){
    $source = array('.', ',');
    $replace = array('', '.');
    return str_replace($source, $replace, $valorDoUsuario);
}
