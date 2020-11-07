<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Pedidos.php";
require_once "../../Classes/Utilitarios.php";

$obj = new pedidos();
$objUtils = new utilitarios();

$c = new conectar();
$conexao = $c->conexao();

$idPedido = $_GET['idPedido'];

$sql = "SELECT id_pedido, id_cliente, id_produto, id_usuario, descricao, quantidade_itens, valor_total, status, data_hora_pedido
FROM pedidos 
WHERE id_pedido = '$idPedido'";

$result = mysqli_query($conexao, $sql);

$mostrar = mysqli_fetch_row($result);

$idCliente = $mostrar[1];
$data_hora = $mostrar[8];
?>

<html>
<title>COMPROVANTE DE PEDIDO - RASHSUSHI</title>
    <head>
        <link rel="stylesheet" type="text/css" href="../../Css/Comprovante.css">
    </head>
    <body class="container comprovante">
        <div class="text-center" align="center">
            <div>
                <img src="../../Img/RASHSUSHI_LOGO.png" width="200" widht="200">
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <form>
                <div class="formulario">
                    <span class="titulo">DADOS DO CLIENTE</span>
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
                        <span class="titulo">DADOS DA ENTREGA</span>
                        <hr>
                    </div>
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
                    <span class="titulo">DADOS DO(s) PRODUTO(s)</span>
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
                        <div class="itemForm">
                            <span class="subItemForm">DATA/HORA</span>
                            <div><?php echo $objUtils -> data($data_hora) ?></div>
                        </div>
                        <div class="itemForm">
                            <span class="subItemForm">VALOR TOTAL</span>
                            <div><?php echo "R$ ".$valorTotal ?></div>
                        </div>
                    </div>
                <?php } ?>
            </form>

            <div class="text-center qrCode" align="center">
                <div>
                    <img src="../../Img/QRCODE.png" width="150" widht="150">
                </div>
            </div>
        </div>
    </body>
</html>

<style>

</style>