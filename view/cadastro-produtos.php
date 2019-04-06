<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <div class="container">
        <form action="../controller/controller.php" method="post">

            <input type="number" name="codigoProduto" id="codigoProduto" placeholder="Digite aqui o código" >
            <input type="text" name="nomeProduto" id="nomeProduto" placeholder="Digite o nome do produto" >
            <input type="text" name="tipoProduto" id="tipoProduto" placeholder="Digite o tipo" >
            <input type="text" name="valorProduto" id="valorProduto" placeholder="Digite o valor" >
            <input type="number" name="quantidade" id="quantidade" >

            <input type="submit" name="enviarForm" id="enviarForm">
            

        </form>
    </div>
</body>
</html>