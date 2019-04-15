<?php 
header('Content-Type: text/html; charset=utf-8');
include "../DAO/daousuario.class.php";
include '../utilities/validation.class.php';

$validation = new Validation();
if (isset($_GET["op"])) {
    $op = $_GET["op"];

    $daoUsuario = new DaoUsuario();
    switch ($op) {
        case 1:
            $erros = Array();
            if (!$validation->validarString($_POST["nomeUsuario"])) {
                $erros[] = "Nome inválido!";
            } else if ($_POST["senhaUsuario"] != $_POST["confirmarSenhaUsuario"]) {
                $erros[] = "Senha não confere";
            }
            break;
        
        default:
            # code...
            break;
    }
}