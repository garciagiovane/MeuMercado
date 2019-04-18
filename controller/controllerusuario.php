<?php header('Content-Type: text/html; charset=utf-8');
include "../DAO/daousuario.class.php";
include "../utilities/validation.class.php";
include_once "../model/usuario.class.php";
session_start();

$validation = new Validation();
$daoUsuario = new DaoUsuario;
$usuario = new Usuario;
if (isset($_GET["op"])) {
    $op = $_GET["op"];

    switch ($op) {
        case 1:
            $erros = Array();
            if (!$validation->validarString($_POST["nomeUsuario"])) {
                $erros[] = "Nome inválido!";
            } 
            if (!$validation->validarSenha($_POST["senhaUsuario"], $_POST["confirmarSenhaUsuario"])) {
                $erros[] = "Senha inválida!";
            }
            if ($_POST["listaNivelAcesso"] != 1 && $_POST["listaNivelAcesso"] != 2) {
                $erros[] = "Selecione um nível de acesso!";
            }
            
            if(count($erros) > 0) {
                $_SESSION["erroCadastroUsuario"] = serialize($erros);
                header("Location: ../view/cadastro-usuario.php");
            } else {
                $usuario->setCodigo(1000);
                $usuario->setNome(mb_strtolower($_POST["nomeUsuario"], "UTF-8"));
                $usuario->setSenha(password_hash($_POST["senhaUsuario"], PASSWORD_DEFAULT));
                $usuario->setCargo($_POST["listaNivelAcesso"]);

                if($daoUsuario->criarUsuario($usuario)){
                    $_SESSION["usuarioCadastrado"] = "Usuário cadastrado!";
                    header("Location: ../view/cadastro-usuario.php");
                }
            }
            break;
        
        default:
            
            break;
    }
}