<?php header('Content-Type: text/html; charset=utf-8');
include '../model/conexaobanco.class.php';

class DaoUsuario {
    public static function criarUsuario() {

        $senhaNaoCriptografada = "testesoftware";
        $senhaCriptografada = password_hash($senhaNaoCriptografada, PASSWORD_DEFAULT);

        if (password_verify($senhaNaoCriptografada, $senhaCriptografada)) {
            echo "Esse é o hash" . $senhaCriptografada;
        } else {
            echo "Não deu!";
        }
        return true;
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
