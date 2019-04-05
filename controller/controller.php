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
