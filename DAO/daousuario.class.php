<?php header('Content-Type: text/html; charset=utf-8');
require_once "../model/conexaobanco.class.php";

class DaoUsuario {
    private $conexao = null;
    public function __construct(){
        $this->conexao = ConexaoBanco::getInstance();
    }

    public static function criarUsuario(Usuario $usuario) {
        //password_verify($senhaNaoCriptografada, $senhaCriptografada)
        try {
            $conexao = ConexaoBanco::getInstance();
            echo $usuario->getSenha();
            $sqlInsert = $conexao->prepare("INSERT INTO usuarios (codigoUsuario, nomeUsuario, senhaUsuario, cargo) VALUES (null, :nome, :senha, :cargo)");
            $sqlInsert->execute(array(
                'nome' => $usuario->getNome(),
                'senha' => $usuario->getSenha(),
                'cargo' => $usuario->getCargo()
            ));

            return true;
        } catch (\Throwable $th) {
            throw $th->getMessage();
        }
    }

    public static function buscarTodos($parametro) {
        try {
            $conexao = ConexaoBanco::getInstance();
            $sql = $conexao->prepare("SELECT * FROM usuarios WHERE " . $parametro);
            $sql->execute();
            $resultado = $sql->fetchAll();

            return $resultado;
        } catch (PDOException $erro) {
            echo '<p>Erro ao buscar em DaoUsuário' . $erro->getMessage() . "</p>";
        }
    }

    public static function listarTodos(){
        try {
            $conexao = ConexaoBanco::getInstance();
            $sql = $conexao->prepare("SELECT * FROM usuarios");
            $sql->execute();
            $resultado = $sql->fetchAll();            

            return $resultado;
        } catch (Exception $e) {
            echo '<p>Erro ao buscar em DaoUsuário' . $e->getMessage() . "</p>";
        }
    }

    public static function alterarUsuario(Usuario $usuario){
        try {
            $conexao = ConexaoBanco::getInstance();
            $nomeUsuario = $usuario->getNome();
            $senhaUsuario = $usuario->getSenha();
            $codigoUsuario = $usuario->getCodigo();
            
            $sql = $conexao->prepare("UPDATE usuarios SET nomeUsuario = '$nomeUsuario', senhaUsuario = '$senhaUsuario' WHERE codigoUsuario = '$codigoUsuario'");
            $sql->execute();
            
            return true;
        } catch (\Throwable $erro) {
            throw $erro;
        }
    }
}
