<?php session_start();
header('Content-Type: text/html; charset=utf-8');
include "../DAO/daousuario.class.php";
include "../utilities/validation.class.php";
include_once "../model/usuario.class.php";

$validation = new Validation();
$daoUsuario = new DaoUsuario;
$usuario = new Usuario;
if (isset($_GET["op"])) {
    $op = $_GET["op"];
    $erros = array();
    switch ($op) {
        case 1:

            if (!$validation->validarString($_POST["nomeUsuario"])) {
                $erros[] = "Nome inválido!";
            }
            if (!$validation->validarSenha($_POST["senhaUsuario"], $_POST["confirmarSenhaUsuario"])) {
                $erros[] = "Senha inválida!";
            }
            if ($_POST["listaNivelAcesso"] != 1 && $_POST["listaNivelAcesso"] != 2) {
                $erros[] = "Selecione um nível de acesso!";
            }

            if (count($erros) > 0) {
                $_SESSION["erroCadastroUsuario"] = serialize($erros);
                header("Location: ../view/cadastro-usuario.php");
            } else {
                $usuario->setNome(mb_strtolower($_POST["nomeUsuario"], "UTF-8"));
                $usuario->setSenha(password_hash($_POST["senhaUsuario"], PASSWORD_DEFAULT));
                $usuario->setCargo($_POST["listaNivelAcesso"]);

                if ($daoUsuario->criarUsuario($usuario)) {
                    $nomeParaBusca = $usuario->getNome();
                    $parametro = "nomeUsuario = '$nomeParaBusca'";
                    
                    $usuarioEncontrado = $daoUsuario->buscarTodos($parametro);
                    $codigoGerado;
                    foreach($usuarioEncontrado as $user){
                        $codigoGerado = $user["codigoUsuario"];
                    }

                    $_SESSION["usuarioCadastrado"] = "Usuário cadastrado com sucesso, código de acesso: " . $codigoGerado;
                    header("Location: ../view/cadastro-usuario.php");
                }
            }
            break;
        case 2:
            if (!$validation->validarCodigoProduto($_POST["codigoUsuario"])) {
                $erros[] = "Código inválido!";
            }
            if (!$validation->validarSenhaLogin($_POST["senhaLogin"])) {
                $erros[] = "Senha inválida!";
            }
            if (count($erros) > 0) {
                $_SESSION["erroCadastroUsuario"] = serialize($erros);
                header("Location: ../view/login.php");
            } else {
                $parametro = "codigoUsuario = " . $_POST["codigoUsuario"];
                $usuarioEncontrado = $daoUsuario->buscarTodos($parametro);
                var_dump($usuarioEncontrado);
                if (count($usuarioEncontrado) > 0) {
                    $usuarioLogado = new Usuario;
                    $senha;

                    foreach ($usuarioEncontrado as $userLogado) {
                        $usuarioLogado->setNome($userLogado["nomeUsuario"]);
                        $usuarioLogado->setCodigo($userLogado["codigoUsuario"]);
                        $usuarioLogado->setCargo($userLogado["cargo"]);
                        $senha = $userLogado["senhaUsuario"];
                    }

                    if ($validation->compararSenhas($_POST["senhaLogin"], $senha)) {
                        $_SESSION["usuarioLogado"] = $usuarioLogado;
                        if (isset($_GET["return_url"])) {
                            $return_url = $_GET["return_url"];
                            header("Location: $return_url");
                        } else {
                            header("Location: ../view/");
                        }
                    } else {
                        $_SESSION["usuarioNaoEncontrado"] = "Usuário não encontrado na senha $senha";
                        echo $senha;
                        header("Location: ../view/login.php");    
                    }
                } else {
                    $_SESSION["usuarioNaoEncontrado"] = "Usuário não encontrado";
                    header("Location: ../view/login.php");
                }
            }
            break;
        case 3:
            unset($_SESSION["usuarioLogado"]);
            header("Location: ../view/");
            break;
        default:

            break;
    }
}
