<?php
/**
 * Description of DaoUsuario
 *
 * @author giova
 */
require '../model/conexaobanco.class.php';
class DaoUsuario {
    //put your code here
    /**
     * 
     * @return Retorna um Array com dados da tabela usuarios
     */
    public static function buscarTodos() {
        try {
            $sql = "SELECT * FROM usuarios";
            $resulConsulta = ConexaoBanco::getInstance()->query($sql);
            
            /*$f_lista[] = $result->fetchAll(PDO::FETCH_ASSOC);*/
  
            return $resulConsulta;
        } catch (Exception $e) {
            echo '<p>Erro ao buscar em DaoUsuário' . $e->getMessage() . "</p>";
        }
    }
}
