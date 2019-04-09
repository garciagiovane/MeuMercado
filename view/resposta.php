<?php include("../includes/config.php"); include("../includes/head-tags.php"); session_start(); ?>
<body>
    <div class="container">
    <?php
        if (isset($_SESSION["erroCadastroDAO"])){
            
            echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro cadastro DAO</p>";
                echo "<p>" . $_SESSION["erroCadastroDAO"] . "</p>";
            echo "</div>";
            unset($_SESSION["erroCadastroDAO"]);

        } else if(isset($_SESSION["erroConexao"])){
            
            echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro de conexão</p>";
                echo $_SESSION["erroConexao"];
            echo "</div>";
            unset($_SESSION["erroConexao"]);

        } else if(isset($_SESSION["erroComparaCodigo"])){

            echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao comparar código</p>";
                echo $_SESSION["erroComparaCodigo"];
            echo "</div>";
            unset($_SESSION["erroComparaCodigo"]);

        } else if (isset($_SESSION["erroBuscarProduto"])){

            echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro ao buscar produtos</p>";
                echo $_SESSION["erroBuscarProduto"];
            echo "</div>";
            unset($_SESSION["erroBuscarProduto"]);

        } else if (isset($_SESSION["erroOpControle"])){

            echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Operação inválida: Controle</p>";
                echo $_SESSION["erroOpControle"];
            echo "</div>";
            unset($_SESSION["erroOpControle"]);

        } else if(isset($_SESSION["erroBuscaPorNomeControle"])){

            echo "<div class='alert alert-danger' role='alert'>";
                echo "<p>Erro busca por parâmetro: Controle</p>";
                echo $_SESSION["erroBuscaPorNomeControle"];
            echo "</div>";
            unset($_SESSION["erroBuscaPorNomeControle"]);

        } else {
            echo "<div class='alert alert-danger' role='alert'>
                    <p>Acesso negado, retorne a <a href='index.php'>página inicial</a></p>  
                </div>";
        }
    ?>
    <button type="button" onclick="location.href='index.php';" class="btn btn-danger btn-lg">Página Inicial</button>
    </div>
</body>


