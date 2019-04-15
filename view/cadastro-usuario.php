<?php require "../includes/config.php";
header('Content-Type: text/html; charset=utf-8'); ?>

<head> <?php require "../includes/head-tags.php"; ?> </head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">MeuMercado!</h1>
            <p class="lead">Cadastro de usuários</p>
            <hr class="my-4">
            <form action="../controller/controllerusuario.php?op=1" method="POST">
                <div class="form-group row">
                    <label for="nomeUsuario" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" placeholder="Digite o nome do usuário" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="senhaUsuario" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="senhaUsuario" id="senhaUsuario" placeholder="Digite a senha do usuário" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmarSenhaUsuario" class="col-sm-2 col-form-label">Confirme a senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="confirmarSenhaUsuario" id="confirmarSenhaUsuario" placeholder="Confirme a senha do usuário" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="listaNivelAcesso">Nível de acesso</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" id="listaNivelAcesso">
                            <option selected>Escolha uma opção</option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuário</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                <button type="button" class="btn btn-info btn-lg" id="homePage" onclick="location.href='index.php';">Página Inicial</button>
            </form>
        </div>
    </div>
</body>