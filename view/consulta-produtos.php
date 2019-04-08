<?php include("../includes/config.php"); session_start();?>
<head>
    <?php include("../includes/head-tags.php"); ?>
    <script>
        
    </script>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">MeuMercado!</h1>
            <p class="lead">Consulta de Produtos</p>
            <hr class="my-4">

            <?php 
                if (isset($_SESSION["produtosNoBanco"])) {
                    $produtos = unserialize($_SESSION["produtosNoBanco"]);
                    foreach ($produtos as $prod){
                        echo "<table>";
                            echo "<thead>";
                                echo "<tr>";

                                    echo "<th scope='col'>Código produto</th>";
                                    echo "<th scope='col'>Nome Produto</th>";
                                    echo "<th scope='col'>Tipo produto</th>";
                                    
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                echo "<tr>";
                                    echo "<td scope='row'>" . $prod["codigoProduto"] . "</td>";
                                    echo "<td>" . $prod["nomeProduto"] . "</td>";
                                    echo "<td>" . $prod["tipoProduto"] . "</td>";
                                echo "</tr>";
                            echo "</tbody>";
                        echo "</table>";
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>";
                        echo "<p>Sem Produtos: consulta-produtos</p>";
                        
                    echo "</div>";
                    
                }
            ?>


        </div>
    </div>
</body>