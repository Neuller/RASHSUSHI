<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";
require_once "../../Classes/Utilitarios.php";

$objv = new servicos();
$objUtils = new utilitarios();

$c = new conectar();
$conexao = $c->conexao();

$idServico = $_GET['idserv'];

$sql = "SELECT serv.ID_Servico,
 	serv.ID_Cliente,
 	serv.ID_Status,
	serv.Equipamento,
	serv.Info,
	serv.Servico,
	serv.idTecnico,
    serv.SerialNumber,
    serv.Garantia,
    serv.Preco,
    serv.DataCadastro,
    serv.DataSaida,
    serv.Diagnostico
	FROM servicos AS serv WHERE ID_Servico='$idServico'";

$result = mysqli_query($conexao, $sql);

$mostrar = mysqli_fetch_row($result);

$codigoServico = $mostrar[0];
$dataEntrada = $mostrar[10];
$dataSaida = $mostrar[11];
$idCliente = $mostrar[1];
$idStatus = $mostrar[2];
$idTecnico = $mostrar[6];
$serialNumber = $mostrar[7];
$garantia = $mostrar[8];
$valorTotal = $mostrar[9];
?>

<html>
<link rel="stylesheet" type="text/css" href="../../Lib/bootstrap/css/bootstrap.css">

<!-- TÍTULO -->
<title>ORDEM DE SERVICO - NSERV</title>

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
        <div class="tituloOrdemServico">
            <span><strong>ORDEM DE SERVIÇO</strong></span>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">

        <form class="formularioOrdemServico fonteOrdemServico">
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
            <div class="equipamentoServicos">
                <div class="text-left">
                    <label><strong>EQUIPAMENTO E SERVIÇOS</strong></label>
                </div>
                <hr>
            </div>
            <div class="dadosEquipamento">
                <div>
                    <span>EQUIPAMENTO:</span>
                    <span><?php echo $mostrar[3]; ?></span>
                </div>
                <div>
                    <span>NÚMERO DE SÉRIE:</span>
                    <span><?php echo $serialNumber; ?></span>
                </div>
                <div>
                    <span>OBSERVAÇÕES:</span>
                    <span><?php echo $mostrar[4]; ?></span>
                </div>
                <div>
                    <span>DATA DE ENTRADA:</span>
                    <span><?php echo $objUtils->data($dataEntrada); ?></span>
                </div>
                <div>
                    <span>DATA DE SAÍDA:</span>
                    <span><?php echo $dataSaida; ?></span>
                </div>
                <div>
                    <span>SERVIÇO(s) EXECUTADO(s):</span>
                    <span><?php echo  $mostrar[5]; ?></span>
                </div>
                <div>
                    <span>TÉCNICO:</span>
                    <span><?php echo $objv->nomeTecnico($idTecnico); ?></span>
                </div>
                <div>
                    <span>GARANTIA:</span>
                    <span><?php echo  $garantia ?></span>
                </div>
                <div>
                    <span>VALOR TOTAL:</span>
                    <span>R$ <?php echo  $valorTotal ?></span>
                </div>
            </div>
        </form>
        <!-- CONDIÇÕES DE SERVIÇOS -->
        <div class="equipamentoServicos">
            <div class="text-center" align="center">
                <div>
                    <span><strong>CONDIÇÕES DE SERVIÇOS</strong></span>
                </div>
            </div>
            <div class="text-justity condicoesServico">
                <div>
                    <span>
                        Orçamento de IMPRESSORAS e NOTEBOOKS,
                        será cobrada uma taxa de R$ 25,00 caso o mesmo seja recusado pelo cliente.
                    </span>
                </div>
                <div>
                    <span>
                        Após 90 dias para retirada do equipamento, será cobrado MULTA no valor de R$ 01,00 ao dia a título de guarda.
                    </span>
                </div>
            </div>
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
    .tituloOrdemServico {
        margin: 30px;
    }

    .formulario {
        position: fixed;
    }

    .formularioOrdemServico {
        margin-top: 5px;
        border: 1px solid #000;
        padding: 15px;
    }

    .equipamentoServicos {
        margin-top: 30px;
    }

    .condicoesServico {
        margin-top: 15px;
        color: red;
        font-size: 11px;
    }

    .msgFidelidade {
        margin-top: 15px;
        font-size: 11px;
    }

    .dadosCliente, .dadosEquipamento{
        font-size: 13px;
    }
</style>