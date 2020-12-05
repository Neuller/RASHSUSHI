<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Pedidos.php";
require_once "../../Classes/Utilitarios.php";

$obj = new pedidos();
$objUtils = new utilitarios();

$c = new conectar();
$conexao = $c->conexao();

$idPedido = $_GET['idPedido'];

$sql = "SELECT id_pedido, id_cliente, id_produto, id_usuario, id_entregador, descricao, quantidade_itens, valor_total, 
status, data_hora_pedido, endereco_entrega, troco, valor_pagamento, forma_pagamento
FROM pedidos 
WHERE id_pedido = '$idPedido'";

$result = mysqli_query($conexao, $sql);

$mostrar = mysqli_fetch_row($result);

$idCliente = $mostrar[1];
$idEntregador = $mostrar[4];
$data_hora = $mostrar[9];
$enderecoEntrega = $mostrar[10];
$troco = $mostrar[11];
$valorPagamento = $mostrar[12];
$formaPagamento = $mostrar[13];
?>

<html>
<title>COMPROVANTE DE PEDIDO - RASHSUSHI</title>
    <head>
        <link rel="stylesheet" type="text/css" href="../../Css/CupomFiscal.css">
    </head>
    <body class="container comprovante">
        <div class="text-center" align="center">
            <!-- LOGO -->
            <div>
                <img src="../../Img/RASHSUSHI_LOGO.png" width="150" widht="150">
            </div>
            <!-- INFORMACOES DA EMPRESA -->
            <div class="informacoesEmpresa">
                <div class="">-- RASH SUSHI --</div>
                <div class="">39.664.307/0001-22</div>
                <div class="">RUA DOS ANTÚRIOS, 293</div>      
                <div class="">SAPUCAIAS, CONTAGEM - MG</div>
                <div class="">(31) 9 9344-0749</div>          
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <form>
                <div class="formulario">
                    <span class="titulo">INFORMAÇÕES DO CLIENTE</span>
                    <hr>
                </div>
                <?php
                $sql = "SELECT nome, cpf, cnpj, cep, bairro, uf , endereco, numero, complemento, celular
                FROM clientes WHERE id_cliente = '$idCliente'";

                $result = mysqli_query($conexao, $sql);
                while ($dadosCliente = mysqli_fetch_row($result)) {
                ?>
                    <div class="formulario">
                        <!-- NOME -->
                        <div><?php echo $dadosCliente[0]; ?></div>
                        <!-- CPF -->
                        <div><?php echo $dadosCliente[1]; ?></div>
                        <!-- CELULAR -->
                        <div><?php echo $dadosCliente[9]; ?></div>
                    </div>
                    <div class="formulario">
                        <span class="titulo">INFORMAÇÕES DA ENTREGA</span>
                        <hr>
                    </div>

                    <!-- ENTREGADOR -->
                    <?php if (($idEntregador != "") && ($idEntregador != NULL) && ($idEntregador != "0") && ($idEntregador != 0)){
                        echo 
                        "<div class='itemForm'>
                            <span class='subItemForm'>ENTREGADOR</span>
                            <div>".$objUtils -> obterNomeEntregador($idEntregador)."</div>
                        </div>";   
                        }
                    ?>

                    <div class="formulario">
                        <!-- CEP -->
                        <div><?php echo $dadosCliente[3]; ?></div>
                        <!-- ENDERECO -->
                        <div><?php echo $dadosCliente[6]; ?></div>
                        <!-- BAIRRO -->
                        <div><?php echo $dadosCliente[4]; ?></div>
                        <!-- NUMERO -->
                        <div><?php echo $dadosCliente[7]; ?></div>
                        <!-- COMPLEMENTO -->
                        <div><?php echo $dadosCliente[8]; ?></div>
                    </div>
                <?php } ?>

                <div class="formulario">
                    <span class="titulo">INFORMAÇÕES DO(s) PRODUTO(s)</span>
                    <hr>
                </div>
                <?php 
                    $sql="SELECT pe.id_pedido, pe.id_cliente, pe.id_produto, pe.id_usuario, pe.descricao, pe.quantidade_itens, pe.valor_total,
                    pe.status, pe.data_hora_pedido, comb.descricao, comb.quantidade_pecas, comb.valor_total
                    FROM pedidos AS pe
                    INNER JOIN produtos_combinado AS comb
                    ON pe.id_produto = comb.id_produto
                    and pe.id_pedido='$idPedido'";
                                    
                    $resultado = mysqli_query($conexao, $sql);
                    while($produto = mysqli_fetch_row($resultado)){
                ?>
                    <div class="formulario">
                        <!-- DESCRIÇÃO -->
                        <div><?php echo $produto[4] ?></div>
                        <!-- QUANTIDADE DE ITENS -->
                        <div>QTDE: <?php echo $produto[5] ?></div>
                        <!-- VALOR -->
                        <div>VALOR: R$ <?php echo $produto[6] ?></div>
                    </div>              
                <?php } ?> 

                <?php
                    $sql = "SELECT SUM(valor_total) FROM pedidos WHERE id_pedido = '$idPedido'";
                    $resultado = mysqli_query($conexao, $sql);
                    while ($total = mysqli_fetch_row($resultado)) {
                    $valorTotal = $total[0];
                ?> 
                    <div class="formulario">
                        <!-- DATA HORA -->
                        <div class="itemForm">
                            <span class="subItemForm">DATA/HORA</span>
                            <div><?php echo $objUtils -> data($data_hora) ?></div>
                        </div>

                        <!-- FORMA DE PAGAMENTO -->
                        <?php if (($formaPagamento == "DINHEIRO") || ($formaPagamento == "CARTAO")){
                            echo 
                            "<div class='itemForm'>
                                <span class='subItemForm'>FORMA DE PAGAMENTO</span>
                                <div>".$formaPagamento."</div>
                            </div>";   
                            }
                        ?>

                        <!-- VALOR TOTAL -->
                        <div class="itemForm">
                            <span class="subItemForm">VALOR TOTAL</span>
                            <div><?php echo "R$ ".$valorTotal ?></div>
                        </div>
                        
                        <!-- VALOR DO PAGAMENTO -->
                        <?php if (($valorPagamento != "") || ($valorPagamento != 0) || ($valorPagamento != 0.00) || ($valorPagamento != null) || ($valorPagamento != "0.00")){
                            echo 
                            "<div class='itemForm'>
                                <span class='subItemForm'>VALOR DO PAGAMENTO</span>
                                <div>R$ ".$valorPagamento."</div>
                            </div>";
                            }
                        ?>

                        <!-- TROCO -->
                        <?php if (($troco != "") || ($troco != 0) || ($troco != 0.00) || ($troco != null) || ($troco != "0.00")){
                            echo 
                            "<div class='itemForm'>
                                <span class='subItemForm'>TROCO</span>
                                <div>R$ ".$troco."</div>
                            </div>";
                            }
                        ?>

                    </div>
                <?php } ?>
            </form>
            
            <!-- QR CODE -->
            <div class="text-center qrCode" align="center">
                <div>
                    <img src="../../Img/QRCODE.png" width="100" widht="100">
                </div>
            </div>
            <!-- AGRADECIMENTOS -->
            <div class="text-center agradecimentos" align="center">
                <div>--------------------------------------------------</div>
                <div>AGRADECEMOS A PREFERÊNCIA</div>
                <div>VOLTE SEMPRE</div>
            </div>
        </div>
    </body>
</html>

<style>

</style>