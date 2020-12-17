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
WHERE data_referencia = '$data'
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
                <div class="titulo"><?php echo $data ?></div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <form>
                <!-- CAIXA INICIAL -->
                <div class="formulario">
                    <span class="titulo">CAIXA INICIAL</span>
                    <hr>
                </div>
                <?php
                    $sql = "SELECT qtd_notas_entrada, valor_total_notas_entrada, 
                    qtd_moedas_entrada, valor_total_moedas_entrada, valor_total_inicial 
                    FROM fluxo_caixa WHERE data_referencia = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $caixaInicial = mysqli_fetch_row($resultado);
                ?> 
                <!-- QUANTIDADE DE NOTAS -->
                <div class="itemForm">
                    <span class="subItemForm">QUANTIDADE DE NOTAS: </span>
                    <span><?php echo $caixaInicial[0]?></span>
                </div>
                <!-- VALOR TOTAL DE NOTAS -->
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL DE NOTAS: </span>
                    <span><?php echo "R$ ".$caixaInicial[1]?></span>
                </div>
                <!-- QUANTIDADE DE MOEDAS -->
                <div class="itemForm">
                    <span class="subItemForm">QUANTIDADE DE MOEDAS: </span>
                    <span><?php echo $caixaInicial[2]?></span>
                </div>
                <!-- VALOR TOTAL DE MOEDAS -->
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL DE MOEDAS: </span>
                    <span><?php echo "R$ ".$caixaInicial[3]?></span>
                </div>
                <!-- VALOR TOTAL -->
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL: </span>
                    <span><?php echo "R$ ".$caixaInicial[4]?></span>
                </div>

                <!-- PEDIDOS -->
                <div class="formulario">
                    <span class="titulo">PEDIDOS</span>
                    <hr>
                </div>
                <!-- NÚMERO DE PEDIDOS -->
                <?php
                    $sql = "SELECT COUNT(id_pedido) FROM pedidos WHERE data_referencia = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdPedidos = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">NÚMERO DE PEDIDOS: </span>
                    <span><?php echo $qtdPedidos[0]?></span>
                </div>
                <!-- TOTAL DE PEDIDOS -->
                <?php
                    $sql = "SELECT SUM(valor_total) FROM pedidos WHERE data_referencia = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $valorTotalPedidos = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL DE PEDIDOS: </span>
                    <span><?php echo "R$ ".$valorTotalPedidos[0]?></span>
                </div>
                <!-- TOTAL DE TROCO -->
                <?php
                    $sql = "SELECT SUM(troco) FROM pedidos WHERE data_referencia = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $troco = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL DE TROCO: </span>
                    <span><?php echo "R$ ".$troco[0]?></span>
                </div>
                <!-- PAGAMENTOS EM DINHEIRO -->
                <?php
                    $sql = "SELECT COUNT(id_pedido) FROM pedidos WHERE forma_pagamento = 'DINHEIRO' AND data_referencia = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $pagtoDinheiro = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">PAGAMENTOS EM DINHEIRO: </span>
                    <span><?php echo $pagtoDinheiro[0]?></span>
                </div>
                <!-- PAGAMENTOS NO DÉBITO -->
                <?php
                    $sql = "SELECT COUNT(id_pedido) FROM pedidos WHERE forma_pagamento = 'DEBITO' AND data_referencia = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $pagtoDebito = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">PAGAMENTOS NO DÉBITO: </span>
                    <span><?php echo $pagtoDebito[0]?></span>
                </div>
                <!-- PAGAMENTOS NO CRÉDITO -->
                <?php
                    $sql = "SELECT COUNT(id_pedido) FROM pedidos WHERE forma_pagamento = 'CREDITO' AND data_referencia = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $pagtoCredito = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">PAGAMENTOS NO CRÉDITO: </span>
                    <span><?php echo $pagtoCredito[0]?></span>
                </div>

                <!-- ENTREGAS -->
                <div class="formulario">
                    <span class="titulo">ENTREGAS</span>
                    <hr>
                </div>
                <!-- NÚMERO DE ENTREGAS -->
                <?php
                    $sql = "SELECT COUNT(realizar_entrega) FROM pedidos WHERE data_referencia = '$data' AND realizar_entrega = 1";
                    $resultado = mysqli_query($conexao, $sql);
                    $qtdEntregas = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">NÚMERO DE ENTREGAS: </span>
                    <span><?php echo $qtdEntregas[0]?></span>
                </div>
                <!-- TAXA FIXA -->
                <?php
                    $sql = "SELECT taxa_dia FROM fluxo_caixa WHERE data_referencia = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $taxaFixa = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">TAXA DE ENTREGA FIXA: </span>
                    <span><?php echo "R$ ".$taxaFixa[0]?></span>
                </div>
                <!-- TOTAL TAXA DE ENTREGA -->
                <?php
                    $sql = "SELECT SUM(taxa_entrega) FROM pedidos WHERE data_referencia = '$data' AND realizar_entrega = 1";
                    $resultado = mysqli_query($conexao, $sql);
                    $taxaEntregas = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">TOTAL TAXA DE ENTREGAS: </span>
                    <span><?php echo "R$ ".$taxaEntregas[0]?></span>
                </div>

                <!-- CAIXA FINAL -->
                <div class="formulario">
                    <span class="titulo">CAIXA FINAL</span>
                    <hr>
                </div>
                <?php
                    $sql = "SELECT qtd_notas_saida, valor_total_notas_saida, 
                    qtd_moedas_saida, valor_total_moedas_saida, valor_total_final 
                    FROM fluxo_caixa WHERE data_referencia = '$data'";
                    $resultado = mysqli_query($conexao, $sql);
                    $caixaFinal = mysqli_fetch_row($resultado);
                ?> 
                <!-- QUANTIDADE DE NOTAS -->
                <div class="itemForm">
                    <span class="subItemForm">QUANTIDADE DE NOTAS: </span>
                    <span><?php echo $caixaFinal[0]?></span>
                </div>
                <!-- VALOR TOTAL DE NOTAS -->
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL DE NOTAS: </span>
                    <span><?php echo "R$ ".$caixaFinal[1]?></span>
                </div>
                <!-- QUANTIDADE DE MOEDAS -->
                <div class="itemForm">
                    <span class="subItemForm">QUANTIDADE DE MOEDAS: </span>
                    <span><?php echo $caixaFinal[2]?></span>
                </div>
                <!-- VALOR TOTAL DE MOEDAS -->
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL DE MOEDAS: </span>
                    <span><?php echo "R$ ".$caixaFinal[3]?></span>
                </div>
                <!-- VALOR TOTAL -->
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL: </span>
                    <span><?php echo "R$ ".$caixaFinal[4]?></span>
                </div>

                <!-- FINANCEIRO -->
                <div class="formulario">
                    <span class="titulo">FINANCEIRO</span>
                    <hr>
                </div>
                <!-- DÉBITO FINANÇAS -->
                <?php
                    $sql = "SELECT SUM(valor) 
                    FROM financas WHERE data_referencia = '$data' AND tipo_financa = 'DEBITO'";
                    $resultado = mysqli_query($conexao, $sql);
                    $debitoFinancas = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">DÉBITO FINANÇAS: </span>
                    <span><?php echo "R$ ".$debitoFinancas[0]?></span>
                </div>
                <!-- CRÉDITO FINANÇAS -->
                <?php
                    $sql = "SELECT SUM(valor) 
                    FROM financas WHERE data_referencia = '$data' AND tipo_financa = 'CREDITO'";
                    $resultado = mysqli_query($conexao, $sql);
                    $creditoFinancas = mysqli_fetch_row($resultado);
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">CRÉDITO FINANÇAS: </span>
                    <span>
                        <?php 
                        if(($creditoFinancas != "") || ($creditoFinancas != null) || ($creditoFinancas != 0)){
                            echo "R$ ".$creditoFinancas[0];
                        }
                        ?>
                    </span>
                </div>

                <!-- RESULTADOS -->
                <div class="formulario">
                    <span class="titulo">RESULTADOS</span>
                    <hr>
                    <div class="text-justify msgResultados">
                        <span>
                            CONSISTE NO RESULTADO DE VALOR TOTAL DO CAIXA FINAL JUNTO AO CRÉDITO FINANCEIRO MENOS DÉBITOS COMO: FINANCEIRO, TAXA DE ENTREGA FIXA E TOTAL DE TAXAS DE ENTREGAS.
                        </span>
                    </div>
                </div>
                <!-- VALOR TOTAL(RESULTADOS) -->
                <?php
                    $resultados = 0;
                    $resultados = $caixaFinal[4] + $creditoFinancas[0];
                    $resultados = $resultados - $debitoFinancas[0] - $taxaFixa[0] - $taxaEntregas[0];
                ?> 
                <div class="itemForm">
                    <span class="subItemForm">VALOR TOTAL: </span>
                    <span><?php echo "R$ ".$resultados?></span>
                </div>
            </form>
        </div>
    </body>
</html>