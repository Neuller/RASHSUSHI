<?php
session_start();
?>

<!DOCTYPE html>
<html>

<body>
    <div class="table-responsive">
        <table id="tabelaVendasTemporaria" class="table table-hover table-condensed table-bordered text-center table-striped">
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
            $cliente = ""; // INICIALIZAR NOME DO CLIENTE
            if (isset($_SESSION['tabelaVendasTemp'])) :
                $i = 0;
                foreach (@$_SESSION['tabelaVendasTemp'] as $key) {
                    $d = explode("||", @$key);
                    $idProduto = $d[0];
                    $estoque = $d[4];
            ?>
                    <tr>
                        <td><?php echo $d[1] ?></td>                      
                        <td><?php echo "R$ " . $d[2]?></td>
                        <td><?php echo $d[5] ?></td>
                        <td>
                            <span class="btn btn-danger btn-sm" onclick="excluir('<?php echo $i; ?>'), atualizarEstoque('<?php echo $idProduto; ?>,<?php echo $estoque; ?>')">
                                <span class="glyphicon glyphicon-remove"></span>
                            </span>
                        </td>
                    </tr>
            <?php
                    $calculoTotal = $d[2] * $d[5];
                    $valorTotal = $valorTotal + $calculoTotal;
                    $i++;
                    $cliente = $d[3];
                }
            endif;
            ?>
            <tr>
                <td>VALOR TOTAL: <?php echo "R$ " . $valorTotal; ?></td>
            </tr>
        </table>
        <div class="btnCadastrar">
            <span class="btn btn-primary" onclick="cadastrarVenda()" id="btnCadastrar" title="Cadastrar">CADASTRAR</span>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        // FUNÇÃO NOME DO CLIENTE
        nome = "<?php echo @$cliente ?>";
        $('#nomeCliente').text(nome);
    });
</script>