<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Vendas.php";
require_once "../../Classes/Utilitarios.php";

$objv = new vendas();
$objUtils = new utilitarios();

$c = new conectar();
$conexao = $c->conexao();

$idVenda = $_GET['idvenda'];

$sql = "SELECT ve.ID_Venda,
 	ve.ID_Cliente,
 	ve.ID_Produto,
    ve.ID_Usuario,
    ve.ValorTotal,
	ve.DataVenda
	FROM vendas AS ve WHERE ID_Venda='$idVenda'";

$result = mysqli_query($conexao, $sql);

$mostrar = mysqli_fetch_row($result);

$codigoVenda = $mostrar[0];
$idCliente = $mostrar[1];
$idVendedor = $mostrar[3];
$dataVenda = $mostrar[5];
?>

<html>
<link rel="stylesheet" type="text/css" href="../../Lib/bootstrap/css/bootstrap.css">

<!-- TÍTULO -->
<title>COMPROVANTE DE VENDA - NSERV</title>

<head class="container">
    <div class="text-center">
        <!-- TÍTULO DA PÁGINA -->
        <title>Nserv</title>
        <!-- ICONE DA PÁGINA -->
        <link rel="icon" href="../../Img/Icon.png">


        <!-- CABEÇALHO -->
        <div class="cabecalho">
            <div class="logo">
                <!-- LOGO -->
                <img src="../../Img/Documentos/CABECALHO_DOCUMENTOS.png" width="600" widht="600">
            </div>
        </div>
    </div>
</head>

<body class="formulario container">
    <!-- ORDEM DE SERVIÇO -->
    <div class="text-center" align="center">
        <div class="titulo">
            <span><strong>COMPROVANTE DE VENDA</strong></span>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">

        <form class="dadosFormulario">
            <!-- INFORMAÇÕES DO CLIENTE -->
            <div>
                <div class="text-left">
                    <label><strong>DADOS DO CLIENTE</strong></label>
                </div>
                <hr>
            </div>
            <?php
            $sql = "SELECT Nome, CPF, CNPJ, CEP, Bairro, Endereco, Numero, Complemento, Telefone, Celular,
            Email
            FROM clientes WHERE ID_Cliente='$idCliente'";

            $result = mysqli_query($conexao, $sql);
            while ($informacoesCliente = mysqli_fetch_row($result)) {
            ?>
                <div class="dadosCliente">
                    <div>
                        <span>NOME:</span>
                        <span><?php echo $informacoesCliente[0]; ?></span>
                    </div>
                    <div>
                        <span>CPF:</span>
                        <span><?php echo $informacoesCliente[1]; ?></span>
                    </div>
                    <div>
                        <span>CNPJ:</span>
                        <span><?php echo $informacoesCliente[2]; ?></span>
                    </div>
                    <div>
                        <span>EMAIL:</span>
                        <span><?php echo $informacoesCliente[10]; ?></span>
                    </div>
                </div>
                <div class="dadosCliente">
                    <div>
                        <span>CEP:</span>
                        <span><?php echo $informacoesCliente[3]; ?></span>
                    </div>
                    <div>
                        <span>ENDEREÇO:</span>
                        <span><?php echo $informacoesCliente[5]; ?></span>
                    </div>
                    <div>
                        <span>BAIRRO:</span>
                        <span><?php echo $informacoesCliente[4]; ?></span>
                    </div>
                    <div>
                        <span>NUMERO:</span>
                        <span><?php echo $informacoesCliente[6]; ?></span>
                    </div>
                    <div>
                        <span>COMPLEMENTO:</span>
                        <span><?php echo $informacoesCliente[7]; ?></span>
                    </div>
                </div>
                <div class="dadosCliente">
                    <span>TELEFONE:</span>
                    <span><?php echo $informacoesCliente[8]; ?></span>
                </div>
                <div>
                    <span>CELULAR:</span>
                    <span><?php echo $informacoesCliente[9]; ?></span>
                </div>
            <?php } ?>
            <!-- INFORMAÇÕES DO EQUIPAMENTO E SERVIÇOS -->           
            <div class="produtosServicos">
                <div class="text-left">
                    <label><strong>PRODUTO(S)</strong></label>
                </div>
                <hr>
            </div>
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
                <div class="informacoesProdutos">
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
                    <span>VENDEDOR:</span>
                    <span>
                    <?php 
                        if($idVendedor == 0){
                            echo "";
                        }else{
                            echo $idVendedor;
                        } 
                    ?>
                    </span>
                </div>
                <div>
                    <span>DATA DA VENDA:</span>
                    <span><?php echo $objUtils->data($dataVenda) ?></span>
                </div>              
                <?php
                    $sql = "SELECT SUM(ValorTotal) FROM vendas WHERE ID_Venda = '$idVenda'";
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
        <!-- MENSAGEM FIDELIDADE -->
        <div class="produtosServicos">
            <div class="text-center msgFidelidade">
                <span>
                    A qualidade é a nossa melhor garantia de fidelidade ao cliente,
                    nossa mais forte defesa contra a concorrência e o único caminho para o crescimento e para os lucros.
                    Agradecemos a preferência!
                </span>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    .titulo {
        margin: 30px;
    }

    .formulario {
        position: fixed;
    }

    .dadosFormulario {
        margin-top: 5px;
        border: 1px solid #000;
        padding: 15px;
    }

    .produtosServicos {
        margin-top: 30px;
    }

    .informacoesProdutos{
        margin-bottom: 10px;
    }

    .msgFidelidade {
        margin-top: 15px;
        font-size: 11px;
    }

    .dadosCliente, .dadosProdutosServicos{
        font-size: 13px;
    }
</style>