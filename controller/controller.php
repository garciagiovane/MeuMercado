<?php
  require '../model/conexaobanco.class.php';
  ConexaoBanco connect = new ConexaoBanco();

  public buscaBanco(){
    $conn = connect->getConnection();
    $stmt = $conn->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    return $stmt;

    echo $stmt;
    echo "ola";
  }//fecha buscaBanco


?>
