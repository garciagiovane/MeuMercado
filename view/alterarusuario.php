<?php session_start();
header('Content-Type: text/html; charset=utf-8');
include "../includes/head-tags.php";
if (isset($_SESSION["usuarioEncontrado"])) {
    $usuarioEncontrado = $_SESSION["usuarioEncontrado"];
    $nomeUsuario;
    $codigoUsuario;

    foreach ($usuarioEncontrado as $user) {
        $nomeUsuario = $user["nomeUsuario"];
        $codigoUsuario = $user["codigoUsuario"];
    }
} else {
    unset($_SESSION["usuarioEncontrado"]);
    header("Location: index.php");
} ?>

<body>
    <div class="container">
        <div class="jumbotron">
            <a href='../controller/controllerusuario.php?op=3' style='position: relative; float: right;' class='btn btn-danger btn-md'>Encerrar sessão</a>
            <h1 class="display-4">Meu mercatto</h1>
            <p class="lead">Alteração de usuários</p>
            <hr class="my-4">
            <form action="../controller/controllerusuario.php?op=6" method="POST">
                <div class="form-group row">
                    <label for="codigoUsuario" class="col-sm-2 col-form-label">Código</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="codigoUsuario" value="<?php echo $codigoUsuario; ?>" id="codigoUsuario" autocomplete="off" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomeUsuario" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomeUsuario" value="<?php echo $nomeUsuario; ?>" id="nomeUsuario" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="senhaUsuario" class="col-sm-2 col-form-label">Senha de no mínimo 8 dígitos</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" value="" minlength="8" name="senhaUsuario" id="senhaUsuario" placeholder="Digite a senha do usuário" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmarSenhaUsuario" class="col-sm-2 col-form-label">Confirme a senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" minlength="8" name="confirmarSenhaUsuario" id="confirmarSenhaUsuario" placeholder="Confirme a senha do usuário" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="listaNivelAcesso">Nível de acesso</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" id="listaNivelAcesso" name="listaNivelAcesso" required>
                            <option>Escolha uma opção</option>
                            <option selected value="1">Administrador</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Alterar</button>
                <button type="button" class="btn btn-info btn-lg" id="homePage" onclick="location.href='index.php';">Página Inicial</button>
            </form>
            <?php
            if (isset($_SESSION["erroAlteracaoUsuario"])) {
                $erros = unserialize($_SESSION["erroAlteracaoUsuario"]);
                echo "<hr class='my4'><div class='alert alert-warning' role='alert'>";
                foreach ($erros as $errosEncontrados) {
                    echo "<p>" . $errosEncontrados . "</p>";
                }
                echo "</div>";
                unset($_SESSION["erroAlteracaoUsuario"]);
            } else if (isset($_SESSION["usuarioAlterado"])) {
                echo "<hr class='my4'><div class='alert alert-primary' role='alert'>";
                echo $_SESSION["usuarioAlterado"];
                echo "</div>";
                unset($_SESSION["usuarioAlterado"]);
            }
            ?>
        </div>
    </div>
</body>