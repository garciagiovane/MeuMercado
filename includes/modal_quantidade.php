<div class="modal fade" id="quantidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleione a quantidade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/controller.php?op=<?php echo $op ?>" method="post">
                    <h5 id="produtoCompra"></h5>

                    <input type="text" name="qtdJaVendida" id="qtdJaVendida" hidden>


                    <input type="text" name="tipoProdutoCompra" id="tipoProdutoCompra" hidden>


                    <input type="text" name="codigoProdutoCompra" id="codigoProdutoCompra" hidden>

                    <div class="input-group mb-3">
                        <input class="form-control" id="quantidadeCompra" name="quantidadeCompra" type="text" required placeholder="Quantidade">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $botaoAnular ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo $botaoCancelar ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>