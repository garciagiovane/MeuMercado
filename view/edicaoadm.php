<?php session_start();
include "../includes/config.php";
include "../includes/head-tags.php";
?>

<body>
    <div class="container">
    <a href='../controller/controllerusuario.php?op=3' style='position: relative; float: right;' class='btn btn-danger btn-md'>Encerrar sessão</a>
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $h1; ?> </h1>
            <p class="lead"><?php echo $lead; ?></p>
            <hr class="my-4">
            <button type="button" class="btn btn-primary " onclick="location.href='../controller/controllerusuario.php?op=4';">Atualizar</button>
            <button type="button" class="btn btn-info " id="homePage" onclick="location.href='index.php';">Página Inicial</button>
            <hr class="my-4">
            <?php

            if (isset($_SESSION["usuariosDoBanco"])) {
                $usuarios = $_SESSION["usuariosDoBanco"];
                echo "<div class='table-responsive'>";
                echo "<table class='table table-hover table-striped' id='dtHorizontalExample' cellspacing='0' width='100%' >";
                echo "<thead>";
                echo "<tr class='table-active'>";

                echo "<th scope='col'>Código Usuário</th>";
                echo "<th scope='col'>Nome</th>";
                echo "<th scope='col'>Cargo</th>";

                echo "<th scope='col'>Alterar</th>";
                echo "<th scope='col'>Excluir</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($usuarios as $users) {
                    echo "<tr>";
                    echo "<td scope='row'>" . $users["codigoUsuario"] . "</td>";
                    echo "<td>" . $users["nomeUsuario"] . "</td>";
                    echo "<td>" . $users["cargo"] . "</td>";

                    echo "<td ><a title='Clique para alterar' style='color: red;' href='../controller/controllerusuario.php?op=5&codigoUsuario=" . $users["codigoUsuario"] . "'><img src='../includes/assets/lapis.png' id='iconeAlteracao' alt='link para alteração de usuários'></a></td>";
                    echo "<td '><a title='Clique para excluir' style='color: red;' href='#" . $users["codigoUsuario"] . "'><img src='../includes/assets/lixo.png' id='iconeExclusao' alt='link para exclusão de usuários'></a></td>";
                    /*
                echo "<td style='text-align: center;'><a title='Clique para excluir' style='color: red;' href='../controller/controller.php?op=5&codExclusao=" . $prod["codigoUsuario"] . "'>X</a></td>";
                echo "<td style='text-align: center;'><a title='Clique para excluir' style='color: red;' href='../controller/controller.php?op=8&codAlteracao=" . $prod["codigoUsuario"] . "'>X</a></td>";
                */

                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</table>";
            } else {
                header("Location: ../controller/controllerusuario.php?op=4");
            }
            ?>
        </div>
    </div>
</body>