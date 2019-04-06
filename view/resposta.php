<?php
session_start();
if (isset($_SESSION["resposta"]))
    echo $_SESSION["resposta"];
else 
    echo "<div class='alert alert-danger' role='alert'>
            <p>Acesso negado, retorne a <a href='index.php'>página inicial</a></p>  
        </div>";
?>


