<?php
class ConexaoBanco extends PDO{
    public static $instance;
  
    public function __construct($dsn,$usuario,$senha) {
        parent::__construct($dsn,$usuario,$senha);
    }
  
    public static function getInstance() {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO('mysql:host=127.0.0.1;dbname=meu_mercado', 'root', '');
                //self::$instance = new PDO('mysql:host=mysql995.umbler.com;dbname=meu_mercado', 'giovanegarcia', 'testesoftware');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
            }
            return self::$instance;
        } catch (Exception $exc) {
            $_SESSION["erroConexao"] = $exc->getMessage();            
            $location = "Location: ../view/resposta.php";
            header($location);
        }
    }
}
