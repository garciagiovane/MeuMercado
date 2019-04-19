<?php session_start(); include "../includes/config.php"; header('Content-Type: text/html; charset=utf-8'); include "../includes/head-tags.php";?>
<body>
    <div class="container">
        <div class="jumbotron">
            <a href='../controller/controllerusuario.php?op=3' style='position: relative; float: right;' class='btn btn-danger btn-md'>Encerrar sessão</a>
            <h1 class="display-4"><?php echo $h1; ?></h1>
            <p class="lead">Cadastro de usuários</p>
            <hr class="my-4">
            <form action="../controller/controllerusuario.php?op=1" method="POST">
                <div class="form-group row">
                    <label for="nomeUsuario" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" placeholder="Digite o nome do usuário" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="senhaUsuario" class="col-sm-2 col-form-label">Senha de no mínimo 8 dígitos</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" minlength="8" name="senhaUsuario" id="senhaUsuario" placeholder="Digite a senha do usuário" autocomplete="off" required>
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
                            <option selected>Escolha uma opção</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                <button type="button" class="btn btn-info btn-lg" id="homePage" onclick="location.href='index.php';">Página Inicial</button>
            </form>
            <?php 
                if (isset($_SESSION["erroCadastroUsuario"])) {
                    $erros = unserialize($_SESSION["erroCadastroUsuario"]);
                    echo "<hr class='my4'><div class='alert alert-warning' role='alert'>";
                    foreach ($erros as $errosEncontrados) {
                        echo "<p>" . $errosEncontrados . "</p>";
                    }
                    echo "</div>";
                    unset($_SESSION["erroCadastroUsuario"]);
                } else if(isset($_SESSION["usuarioCadastrado"])) {
                    echo "<hr class='my4'><div class='alert alert-primary' role='alert'>";
                        echo $_SESSION["usuarioCadastrado"];
                        echo "<small class='form-text text-muted'>Anote o código, em caso de perda entre em contato com o HelpDesk</small>";
                    echo "</div>";
                    unset($_SESSION["usuarioCadastrado"]);
                }
            ?>
        </div>
    </div>
</body>