<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Pedidos.php";
require_once "../../Classes/Utilitarios.php";

$obj = new pedidos();
$objUtils = new utilitarios();

$c = new conectar();
$conexao = $c -> conexao();

$data = $_GET['data'];

$sql = "SELECT SUM(valor_total)
FROM pedidos 
WHERE data = '$data'
GROUP BY id_pedido
ORDER BY id_pedido DESC";

$result = mysqli_query($conexao, $sql);

$mostrar = mysqli_fetch_row($result);

$totalPedidos = $mostrar[0];
?>

<html>
<title>RELATÓRIO DIÁRIO - RASHSUSHI</title>
    <head>
        <link rel="stylesheet" type="text/css" href="../../Css/Comprovante.css">
    </head>
    <body class="container comprovante">
        <div class="text-center" align="center">
            <div class="formulario">
                <span class="titulo">RELATÓRIO DIÁRIO - RASHSUSHI</span>
                <hr>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <form>
                <!-- QUANTIDADE DE PEDIDOS -->
                <div class="itemForm">
                    <span class="subItemForm">QUANTIDADE DE PEDIDOS</span>
                    <div><?php echo $qtdPedidos?></div>
                </div>
                <!-- QUANTIDADE DE ENTREGAS -->
                <div class="itemForm">
                    <span class="subItemForm">QUANTIDADE DE ENTREGAS</span>
                    <div><?php echo $qtdEntregas?></div>
                </div>
                <!-- VALOR TOTAL DE PEDIDOS -->
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL DE PEDIDOS</span>
                    <div><?php echo $totalPedidos?></div>
                </div>
                <!-- VALOR TOTAL DE ENTREGAS -->
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL DE ENTREGAS</span>
                    <div><?php echo $totalEntregas?></div>
                </div>
            </form>
        </div>
    </body>
</html>