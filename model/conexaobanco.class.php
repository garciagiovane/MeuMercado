<?php
  /**
   * @author Giovane Garcia
   *
   */
  class ConexaoBanco extends PDO {
    const $userName = "root";
    const $password = "";
    const $host = "localhost";
    const $db = "meu_mercado";

    public function getConnection(){
      try {
        $conn = new PDO("mysql:dbname=$db;host=$host", $userName, $password);
        return $conn;
      } catch (\Exception $e) {
        echo "Erro: " . $e->getMessage;
      }//fecha try...catch
    }//fecha getConnection
  }//fecha class

?>
