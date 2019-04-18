<?php header('Content-Type: text/html; charset=utf-8');
include "../DAO/daousuario.class.php";
include "../utilities/validation.class.php";
session_start();
$validation = new Validation();
$daoUsuario = new DaoUsuario;
if (isset($_GET["op"])) {
    $op = $_GET["op"];

    switch ($op) {
        case 1:
            $erros = Array();
            if (!$validation->validarString($_POST["nomeUsuario"])) {
                $erros[] = "Nome inválido!";
            } 
            if ($_POST["senhaUsuario"] == null || $_POST["confirmarSenhaUsuario"] == null) {
                $erros[] = "Senha não pode ficar vazia";
            }
            if ($_POST["senhaUsuario"] != $_POST["confirmarSenhaUsuario"]) {
                $erros[] = "Senha não confere";
            }
            if ($_POST["listaNivelAcesso"] != 1 || $_POST["listaNivelAcesso"] != 2) {
                $erros[] = "Selecione um nível de acesso!";
            }
            if($erros > 0) {
                $_SESSION["erroCadastroUsuario"] = serialize($erros);
                header("Location: ../view/cadastro-usuario.php");
            } else {
                $daoUsuario->criarUsuario();
            }
            break;
        
        default:
            
            break;
    }
}