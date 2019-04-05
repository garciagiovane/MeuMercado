<?php
class ConexaoBanco extends PDO{
    public static $instance;
  
    private function __construct($dsn,$usuario,$senha) {
        parent::__construct($dsn,$usuario,$senha);
    }
  
    public static function getInstance() {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO('mysql:host=localhost;dbname=meu_mercado', 'root', '');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
            }//fecha if
            return self::$instance;
        } catch (Exception $exc) {
            echo "<p>Erro: " . $exc->getTraceAsString() . "</p>";
            echo "<p>Erro: " . $exc->getMessage() . "</p>";
        }//fecha try...catch
    }//fecha getInstance
}//fecha class