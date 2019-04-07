<?php include("../includes/config.php"); session_start();?>
<head>
    <?php include("../includes/head-tags.php"); ?>
    <script type="text/javascript">
    function telaInicial() {
        location.href = "index.php";
    }

        /*document.getElementById("homePage").onclick = function () {
            location.href = "index.php";
        };*/
    </script>
</head>
<body>
    <div class="container">
        <form action="../controller/controller.php" method="post">

            <div class="form-group row">                
                <label for="codigoProduto" class="col-sm-2 col-form-label">Código do produto</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="codigoProduto" id="codigoProduto" placeholder="Digite aqui o código" autocomplete="off">
                </div>                
            </div>

            <div class="form-group row">
                <label for="nomeProduto" class="col-sm-2 col-form-label">Nome do produto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Digite o nome do produto" autocomplete="off">
                </div>    
            </div>

            <div class="form-group row">
                <label for="tipoProduto" class="col-sm-2 col-form-label">Tipo do produto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tipoProduto" id="tipoProduto" placeholder="Digite o tipo" autocomplete="off">
                </div>    
            </div>
            
            <div class="form-group row">
                <label for="valorProduto" class="col-sm-2 col-form-label">Valor do produto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="valorProduto" id="valorProduto" placeholder="Digite o valor" autocomplete="off">
                </div>    
            </div>
            
            <div class="form-group row">
                <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="quantidade" id="quantidade" autocomplete="off">
                </div>    
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <button type="button" class="btn btn-danger btn-lg">Limpar</button>
            <button type="button" class="btn btn-info btn-lg" id="homePage" onclick="location.href='index.php';">Tela Inicial</button>
        </form>
        <?php 
        if(isset($_SESSION["respostaCadastro"])){            
            $respostaCadastro = unserialize($_SESSION['respostaCadastro']);
            echo "<div class='alert alert-warning' role='alert'>";

            foreach($respostaCadastro as $res){
                echo "<p>" . $res . "</p>";
            }

            echo "</div>";
            unset($_SESSION["respostaCadastro"]);
        } else if(isset($_SESSION['respostaCadastroOk'])){
            echo "<div class='alert alert-primary' role='alert'>";
            echo "<p>Produto cadastrado com sucesso!</p>";
            echo "<a href='index'>Página Inicial</a>";
            echo "</div>";
            unset($_SESSION["respostaCadastroOk"]);
        }
        ?>
    </div>
</body>
</html>