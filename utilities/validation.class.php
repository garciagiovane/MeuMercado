<?php
class Validation{
    function validarCodigoProduto($codigoProduto){
        return filter_input($codigoProduto, FILTER_VALIDATE_INT);
        if(!filter_input($codigoProduto, FILTER_VALIDATE_INT))
            echo "não passou";
        else
            echo "Passou";
    }

}