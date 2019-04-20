<?php
header('Content-Type: text/html; charset=utf-8');
include "../DAO/daousuario.class.php";
include "../utilities/validation.class.php";
include "../model/usuario.class.php";

session_start();
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
                    $parametroBusca = "nomeUsuario = '$nomeParaBusca'";

                    $usuarioEncontrado = $daoUsuario->buscarTodos($parametroBusca);
                    $codigoGerado;
                    foreach ($usuarioEncontrado as $user) {
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

                if (count($usuarioEncontrado) > 0) {
                    //$usuarioLogado = new Usuario;
                    //$usuarioLogado->setSenha($usuarioEncontrado["senhaUsuario"]);
                    $nome; $senha; $cargo; $codigo;
                    foreach ($usuarioEncontrado as $user) {
                        $nome = $user["nomeUsuario"];
                        $senha = $user["senhaUsuario"];
                        $cargo = $user["cargo"];
                        $codigo = $user["codigoUsuario"];
                    }


                    //$usuarioLogado = $usuarioEncontrado;
                    //var_dump($usuarioLogado);

                    if ($validation->compararSenhas($_POST["senhaLogin"],  $senha )) {
                        $_SESSION["usuarioLogado"] = array(
                            $nome, $senha, $cargo, $codigo
                        );

                        if (isset($_GET["return_url"])) {
                            $return_url = $_GET["return_url"];
                            header("Location: $return_url");
                        } else {
                            header("Location: ../view/");
                        }
                    } else {
                        $_SESSION["usuarioNaoEncontrado"] = "Usuário não encontrado!" + $usuarioLogado->getSenha();
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
        case 4:
            $todosUsuarios = $daoUsuario->listarTodos();
            $_SESSION["usuariosDoBanco"] = $todosUsuarios;
            header("Location: ../view/edicaoadm.php");
            break;
        case 5:
            if (!$validation->validarCodigoProduto($_GET["codigoUsuario"])) {
                $erros[] = "Código usuário inválido!";
            } else {
                $codigoParaAlteracao = $_GET["codigoUsuario"];
                $querySql = "codigoUsuario = '$codigoParaAlteracao'";
                $usuarioEncontrado = $daoUsuario->buscarTodos($querySql);

                if ($usuarioEncontrado != null) {
                    $_SESSION["usuarioEncontrado"] = $usuarioEncontrado;
                    header("Location: ../view/alterarusuario.php");
                } else {
                    $_SESSION["usuarioNaoEncontrado"] = "Usuário não encontrado";
                    header("Location: ../view/alterarusuario.php");
                }
            }
            break;
        case 6:
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
                $_SESSION["erroAlteracaoUsuario"] = serialize($erros);
                header("Location: ../view/alterarusuario.php");
            } else {
                $alteracaoUsuario = new Usuario;

                $alteracaoUsuario->setCodigo($_POST["codigoUsuario"]);
                $alteracaoUsuario->setNome($_POST["nomeUsuario"]);
                $alteracaoUsuario->setSenha(password_hash($_POST["senhaUsuario"], PASSWORD_DEFAULT));

                if ($daoUsuario->alterarUsuario($alteracaoUsuario)) {
                    $_SESSION["usuarioAlterado"] = "Usuário alterado com sucesso!";
                    header("Location: ../view/alterarusuario.php");
                }
            }
            break;
        default:

            break;
    }
}
