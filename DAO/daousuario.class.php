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
            throw $th;
        }
        
    }


    public static function buscarTodos() {
        try {
            $sql = "SELECT * FROM usuarios";
            $resulConsulta = ConexaoBanco::getInstance()->query($sql);

            return $resulConsulta;
        } catch (Exception $e) {
            echo '<p>Erro ao buscar em DaoUsuário' . $e->getMessage() . "</p>";
        }
    }
}
