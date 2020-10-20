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

    <body class="container">
        <div class="text-center" align="center">
            
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <form class="dadosFormulario">
                <?php
                $sql = "SELECT nome, cpf, cnpj, cep, bairro, uf , endereco, numero, complemento, celular
                FROM clientes WHERE id_cliente = '$idCliente'";

                $result = mysqli_query($conexao, $sql);
                while ($dadosCliente = mysqli_fetch_row($result)) {
                ?>
                    <div>
                        <div>
                            <span>NOME:</span>
                            <span><?php echo $dadosCliente[0]; ?></span>
                        </div>
                        <div>
                            <span>CPF:</span>
                            <span><?php echo $dadosCliente[1]; ?></span>
                        </div>
                        <div>
                            <span>CELULAR:</span>
                            <span><?php echo $informacoesCliente[9]; ?></span>
                        </div>
                    </div>
                <?php } ?>
                <div class="dadosProdutosServicos">               
                    <?php 
                        $sql="SELECT ve.ID_Venda,
                        ve.ID_Cliente,
                        ve.ID_Produto,
                        ve.ID_Usuario,
                        ve.ValorTotal,
                        ve.DataVenda,
                        pro.Codigo,
                        pro.Descricao,
                        pro.Garantia,
                        pro.Preco
                        FROM vendas AS ve
                        INNER JOIN produtosnserv AS pro
                        ON ve.ID_Produto = pro.ID_Produto
                        and ve.ID_Venda='$idVenda'";
                                    
                        $resultado = mysqli_query($conexao, $sql);
                        
                        while($produtoPortal = mysqli_fetch_row($resultado)){
                    ?>
                    <div>
                        <ul>
                            <li>
                                <span>CÓDIGO: <?php echo $produtoPortal[6] ?></span>
                                <br>
                                <span>DESCRIÇÃO: <?php echo $produtoPortal[7] ?></span>
                                <br>
                                <span>VALOR: R$ <?php echo $produtoPortal[9] ?></span>
                                <br>
                                <span>GARANTIA: <?php echo $produtoPortal[8] ?></span>
                            </li>
                        </ul>
                    </div>              
                    <?php			    
                    }
                    ?> 
                    
                    <div>
                        <span>DATA DA VENDA:</span>
                        <span><?php echo $objUtils->data($data_hora) ?></span>
                    </div>              
                    <?php
                        $sql = "SELECT SUM(valor_total) FROM pedidos WHERE id_pedido = '$idPedido'";
                        $resultado = mysqli_query($conexao, $sql);
                        while ($total = mysqli_fetch_row($resultado)) {
                        $valorTotal = $total[0];
                    ?>               
                    <div>
                        <span>VALOR TOTAL:</span>
                        <span><?php echo "R$ ".$valorTotal ?></span>
                    </div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </body>
</html>

<style>

</style>