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
                <!-- INFORMAÇÕES GERAIS -->
                <div class="formulario">
                    <span class="titulo">INFORMAÇÕES GERAIS</span>
                    <hr>
                </div>
                <!-- NÚMERO DE PEDIDOS -->
                <?php
                    $sql = "SELECT COUNT(id_pedido) FROM pedidos WHERE data = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdPedidos = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">NÚMERO DE PEDIDOS</span>
                    <div><?php echo $qtdPedidos[0]?></div>
                </div>
                <!-- NÚMERO DE ENTREGAS -->
                <?php
                    $sql = "SELECT COUNT(realizar_entrega) FROM pedidos WHERE data = '$data' AND realizar_entrega = 1";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdEntregas = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">NÚMERO DE ENTREGAS</span>
                    <div><?php echo $qtdEntregas[0]?></div>
                </div>

                <!-- TOTAL DÉBITOS -->
                <div class="formulario">
                    <span class="titulo">FINANCEIRO</span>
                    <hr>
                </div>
                <!-- TAXA DE ENTREGA -->
                <?php
                    $sql = "SELECT SUM(taxa_entrega) FROM pedidos WHERE data = '$data' AND realizar_entrega = 1";
                    $resultado = mysqli_query($conexao, $sql);
                    $taxaEntregas = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">TAXA DE ENTREGA</span>
                    <div><?php echo $taxaEntregas[0]?></div>
                </div>
                <!-- VALOR TOTAL(BRUTO) DE PEDIDOS -->
                <?php
                    $sql = "SELECT SUM(valor_total) FROM pedidos WHERE data = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $valorTotalPedidos = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL(BRUTO) DE PEDIDOS</span>
                    <div><?php echo $valorTotalPedidos[0]?></div>
                </div>
                <!-- LUCRO TOTAL(LÍQUIDO) -->
                <?php
                    $lucoTotalLiquido = $valorTotalPedidos[0] - $taxaEntregas[0];
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">LUCRO TOTAL(LÍQUIDO)</span>
                    <div><?php echo $lucoTotalLiquido?></div>
                </div>
            </form>
        </div>
    </body>
</html>