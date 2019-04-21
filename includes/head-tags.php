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
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <script src="../style/bootstrap.min.js"></script>
    <style>
        #iconeExclusao, #iconeAlteracao, #iconeCompra {
            width: 30px;
            height: 30px;
        }
        @media (max-width: 991.98px) { 
            .container{
                width: 100%;
                padding: 3px;
            }

            .jumbotron {
                width: 100%;
                padding: 0;
            }
        }

        @media (max-width: 767.98px) { 
            .container{
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