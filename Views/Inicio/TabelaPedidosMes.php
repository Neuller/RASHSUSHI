<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Pedidos.php";
require_once "../../Classes/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new pedidos();
$objUtils = new utilitarios();

$dataAtual = date('m');

$sql = "SELECT id_pedido, id_cliente, id_produto, id_usuario, valor_total, status, data_hora_pedido, endereco_entrega
FROM pedidos
WHERE MONTH(data_hora_pedido) = ".$dataAtual."
GROUP BY id_pedido
ORDER BY id_pedido DESC";

$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
    <body>
        <div class="table-responsive">
            <table id="tabelaPedidosMesLoad" class="table table-hover table-condensed table-bordered text-center table-striped">
                <thead>
                    <tr>
                        <td>NÚMERO DO PEDIDO</td>
                        <td>CLIENTE</td>
                        <td>STATUS</td>
                        <td>IMPRIMIR</td>
                        <td>VISUALIZAR</td>
                        <td>CANCELAR</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($mostrar = mysqli_fetch_array($result))
                        {
                            echo 
                            '
                            <tr>
                            <td>'.$mostrar[0].'</td>
                            <td>'.$objUtils->obterCelularCliente($mostrar[1]).'</td>
                            <td>'.$mostrar[5].'</td>
                            <td>'.'<a href="./Procedimentos/Pedidos/CriarComprovante.php?idPedido='.$mostrar[0].'" target="_BLANK" class="btn btn-danger btn-sm" title="IMPRIMIR">
                            <span class="glyphicon glyphicon-print"></span>
                            </a>'.'</td>
                            <td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarPedido" title="VISUALIZAR" onclick="preencherModalVisualizar('.$mostrar[0].')">
                            <span class="glyphicon glyphicon-search"></span>
                            </span>'.'</td>		
                            <td>'.'<span class="btn btn-danger btn-sm" title="CANCELAR" onclick="cancelar('.$mostrar[0].')">
                            <span class="glyphicon glyphicon-remove"></span>
                            </span>'.'</td>
                            </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
		
<script>
$(document).ready(function(){
});
</script>