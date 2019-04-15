<?php header('Content-Type: text/html; charset=utf-8');
class ConexaoBanco extends PDO{
    public static $instance;
  
    public function __construct($dsn,$usuario,$senha) {
        parent::__construct($dsn,$usuario,$senha);
    }
  
    public static function getInstance() {
        try {
            if (!isset(self::$instance)) {
                //self::$instance = new PDO('mysql:host=mysql995.umbler.com:41890;dbname=meu_mercado', 'giovanegarcia', 'testesoftware');
                self::$instance = new PDO('mysql:host=localhost;dbname=mercado', 'root', '');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
            }//fecha if
            return self::$instance;
        } catch (Exception $exc) {
            $_SESSION["erroConexao"] = $exc->getMessage();
            
            $location = "Location: ../view/resposta.php";
            header($location);
        }
    }
}