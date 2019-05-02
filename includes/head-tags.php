<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title><?php print $PAGE_TITLE; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Escolha os produtos que quer no conforto de sua casa">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=”content-type” content=”text/html; charset=UTF-8″ />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="../style/datatables.min.js"></script> -->
    <script type="text/javascript" src="../style/jquery.mask.js"></script>
    <script type="text/javascript" src="../style/jquery.tablesorter.js"></script>
    <script type="text/javascript" src="../style/jquery.tablesorter.widgets.js"></script>
    <script>
        $(document).ready(function() {
            $("#dtHorizontalExample tbody tr").on("click","#abrirModal", function() {
                var linhaAtual = $(this).closest("tr");
                var codigo = linhaAtual.find("td:eq(0)").text();
                var nomeProduto = linhaAtual.find("td:eq(1)").text();
                var tipoProduto = linhaAtual.find("td:eq(2)").text();
                var qtdVendida = linhaAtual.find("td:eq(5)").text();
                $("#codigoProdutoCompra").val(codigo);
                $("#produtoCompra").text("Produto: " + nomeProduto);
                $("#tipoProdutoCompra").val(tipoProduto);
                $("#qtdJaVendida").val(qtdVendida);
            });
            $('.valorProduto').mask('000.000.000.000.000,00', {reverse: true});
            //$('.quantidade').mask('#', {reverse: true});
        })


        $(function() {
            $("#dtHorizontalExample").tablesorter();
        });
        /*
        $(document).ready(function() {
            $('#dtHorizontalExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });*/
    </script>
    <style>
        /*.row {
            width: 100%;

        }*/

        #iconeExclusao,
        #iconeAlteracao,
        #iconeCompra {
            width: 30px;
            height: 30px;
        }

        @media (max-width: 991.98px) {
            .container {
                width: 100%;
                padding: 3px;
            }

            .jumbotron {
                width: 100%;
                padding: 0;
            }
        }

        @media (max-width: 767.98px) {
            .container {
                width: 100%;
                padding: 3px;
            }

            .jumbotron {
                width: 100%;
                padding: 0;
            }
        }
    </style>
</head>
