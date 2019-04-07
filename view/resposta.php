<?php include("../includes/config.php"); include("../includes/head-tags.php"); session_start(); ?>
<body>
    <div class="container">
    <?php
        if (isset($_SESSION["resposta"])){
            echo $_SESSION["resposta"];
            unset($_SESSION["resposta"]);
        }else  {
            echo "<div class='alert alert-danger' role='alert'>
                    <p>Acesso negado, retorne a <a href='index.php'>página inicial</a></p>  
                </div>";
        }
    ?>
    </div>
</body>


