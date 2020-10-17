<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <body>
        <div class="table-responsive">
            <table id="carrinho_compras" class="table table-hover table-condensed table-bordered text-center table-striped">
                <thead>
                    <tr>
                        <td>DESCRIÇÃO</td>
                        <td>VALOR UN</td>
                        <td>QUANTIDADE</td>
                        <td>EXCLUIR</td>
                    </tr>
                </thead>
                <?php
                $valorTotal = 0; // INICIALIZAR VALOR TOTAL
                if (isset($_SESSION['tabelaTemporaria'])) :
                    $i = 0;
                    foreach (@$_SESSION['tabelaTemporaria'] as $key) {
                        $d = explode("||", @$key);
                        $idProduto = $d[0];
                ?>
                        <tr>
                            <td><?php echo $d[1] ?></td>
                            <td><?php echo "R$ " . $d[2] ?></td>
                            <td><?php echo $d[4] ?></td>
                            <td>
                                <span class="btn btn-danger btn-sm" title="EXCLUIR" onclick="remover('<?php echo $i; ?>')">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </span>
                            </td>
                        </tr>
                <?php
                        $calculoTotal = $d[5];
                        $valorTotal = $valorTotal + $calculoTotal;
                        $i++;
                    }
                endif;
                ?>
                <tr>
                    <td>VALOR TOTAL: <?php echo "R$ " . $valorTotal; ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
    });

    function remover(index) {
        $.ajax({
            type: "POST",
            data: "index=" + index,
            url: "./Procedimentos/Pedidos/Remover.php",
            success: function(r) {
                $('#carrinho_compras').load('./Views/Pedidos/CarrinhoCompras.php');
                alertify.success("ITEM REMOVIDO");
            }
        });
    }
</script>