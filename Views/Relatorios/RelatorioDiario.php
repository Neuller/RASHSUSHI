<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Pedidos.php";
require_once "../../Classes/Utilitarios.php";

$obj = new pedidos();
$objUtils = new utilitarios();

$c = new conectar();
$conexao = $c -> conexao();

$data = $_GET['data'];

$sql = "SELECT SUM(valor_total) AS totalPedidos
FROM pedidos 
WHERE data = '$data'
GROUP BY id_pedido
ORDER BY id_pedido DESC";

$result = mysqli_query($conexao, $sql);

$retorno = mysqli_fetch_row($result);

$totalPedidos = mysqli_fetch_assoc($result);
?>

<html>
<title>RELATÓRIO DIÁRIO - RASHSUSHI</title>
    <head>
        <link rel="stylesheet" type="text/css" href="../../Css/Relatorios.css">
    </head>
    <body class="container relatorio">
        <div class="text-center" align="center">
            <div class="cabecalho">
                <div class="titulo">RELATÓRIO DIÁRIO - RASHSUSHI</div>
                <div class="titulo"><?php echo $objUtils -> converterData($data) ?></div>
                <hr>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <form>
                <!-- PEDIDOS -->
                <div class="formulario">
                    <span class="titulo">PEDIDOS</span>
                    <hr>
                </div>
                <!-- NÚMERO DE PEDIDOS -->
                <?php
                    $sql = "SELECT COUNT(id_pedido) FROM pedidos WHERE data = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdPedidos = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">NÚMERO DE PEDIDOS: </span>
                    <span><?php echo $qtdPedidos[0]?></span>
                </div>
                <!-- TOTAL DE PEDIDOS -->
                <?php
                    $sql = "SELECT SUM(valor_total) FROM pedidos WHERE data = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $valorTotalPedidos = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">TOTAL DE PEDIDOS: </span>
                    <span><?php echo $valorTotalPedidos[0]?></span>
                </div>

                <!-- ENTREGAS -->
                <div class="formulario">
                    <span class="titulo">ENTREGAS</span>
                    <hr>
                </div>
                <!-- NÚMERO DE ENTREGAS -->
                <?php
                    $sql = "SELECT COUNT(realizar_entrega) FROM pedidos WHERE data = '$data' AND realizar_entrega = 1";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdEntregas = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">NÚMERO DE ENTREGAS: </span>
                    <span><?php echo $qtdEntregas[0]?></span>
                </div>
                <!-- TAXA FIXA -->
                <div class="itemForm">
                    <span class="subItemForm">TAXA FIXA: </span>
                    <span>A DESENVOLVER</span>
                </div>
                <!-- TOTAL TAXA DE ENTREGA -->
                <?php
                    $sql = "SELECT SUM(taxa_entrega) FROM pedidos WHERE data = '$data' AND realizar_entrega = 1";
                    $resultado = mysqli_query($conexao, $sql);
                    $taxaEntregas = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">TOTAL TAXA DE ENTREGAS: </span>
                    <span><?php echo $taxaEntregas[0]?></span>
                </div>

                <!-- FINANCEIRO -->
                <div class="formulario">
                    <span class="titulo">FINANCEIRO</span>
                    <hr>
                </div>
                <!-- CAIXA (INICIAL) -->
                <div class="itemForm">
                    <span class="subItemForm">CAIXA (INICIAL): </span>
                    <span>A DESENVOLVER</span>
                </div>
                <!-- TOTAL DE TROCO -->
                <div class="itemForm">
                    <span class="subItemForm">TOTAL DE TROCO: </span>
                    <span>A DESENVOLVER</span>
                </div>
                <!-- LUCRO TOTAL(LÍQUIDO) -->
                <?php
                    $lucoTotalLiquido = $valorTotalPedidos[0] - $taxaEntregas[0];
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">LÍQUIDO TOTAL: </span>
                    <span><?php echo $lucoTotalLiquido?></span>
                </div>
            </form>
        </div>
    </body>
</html>