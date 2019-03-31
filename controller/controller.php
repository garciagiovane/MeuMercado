<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Mostra Banco</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <div class="container">
        <table class="table table-hover table-striped table-bordered table-dark">
            <thead>
                <tr>
                    <td scope="col">Código</td>
                    <td scope="col">Nome Usuário</td>
                    <td scope="col">Cargo</td>
                </tr>
            </thead>
            <tbody>
            <?php
            require '../DAO/daousuario.class.php';
            $usuarios = DaoUsuario::buscarTodos();
            foreach ($usuarios as $user){
                echo "<tr>";
                echo "<td scope='row'>" . $user['codigoUsuario'] . "</td>";
                echo "<td>" . $user['nomeUsuario'] . "</td>";
                echo "<td>" . $user['cargo'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
</body>    
</html>
