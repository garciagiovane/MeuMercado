<?php
require '../model/conexaobanco.class.php';
class DaoUsuario {
    public static function buscarTodos() {
        try {
            
            $sql = "SELECT * FROM usuarios";
            $resulConsulta = ConexaoBanco::getInstance()->query($sql);
  
            return $resulConsulta;
        } catch (Exception $e) {
            echo '<p>Erro ao buscar em DaoUsuário' . $e->getMessage() . "</p>";
        }
    }
}
