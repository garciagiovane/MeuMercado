<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <form action="../controller/controller.php" method="POST">
        <input type="number" name="codigoProduto" placeholder="Digite o código" required>
        <input type="text" name="nomeProduto" placeholder="Digite o nome" required>
        <input type="text" name="tipoProduto" placeholder="Digite o tipo. Ex: cerveja" required>
        <input type="text" name="valorProduto" placeholder="Digite o valor" required>
        <input type="number" name="qtdEntrada" placeholder="Digite a quantidade" required>
        <input type="submit">
    </form>
</body>
</html>