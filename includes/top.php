<body>
    <div class="container">
        <?php if (isset($_SESSION["usuarioLogado"])) {
            echo "<a href='../controller/controllerusuario.php?op=3' style='position: relative; float: right;' class='btn btn-danger btn-md'>Encerrar sessão</a>";
        }?>
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $h1; ?></h1>
            <p class="lead"><?php echo $lead; ?></p>
            <hr class="my-4">