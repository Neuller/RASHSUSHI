<?php
session_start();
if (isset($_SESSION['User'])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <?php require_once "./Menu.php"; ?>
        <?php require_once "./Classes/Conexao.php";
        $c = new conectar();
        $conexao = $c->conexao();
        ?>
    </head>

    <body>
        <div class="container">
            <!-- CABEÇALHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>CADASTRAR VENDAS</strong></h3>
                </div>
            </div>

            <!-- FORMULÁRIO CADASTRO DE VENDAS -->
            <div id="formularioCadastarVenda"></div>

            <!-- CARRINHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>CARRINHO</strong><span class="fas fa-shopping-cart ml-15"></span></h3>
                </div>
            </div>
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class="text-left">
                    <div>
                        <label>CLIENTE</label>
                    </div>
                    <div id="nomeCliente"></div>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-sm-12" align="center">
                    <div id="tabelaVendasTemporaria"></div>
                </div>
            </div>
    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#formularioCadastarVenda').load('./Views/Vendas/FormCadastrarVenda.php');
            $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
        });

        function cadastrarVenda() {
            $.ajax({
                url: "./Procedimentos/Vendas/AdicionarVendas.php",
                success: function(r) {
                    if (r > 0) {
                        $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
                        $('#formularioCadastarVenda')[0].reset();
                        alertify.success("VENDA REALIZADA");
                    } else if (r == 0) {
                        alertify.alert("ATENÇÃO", "CARRINHO VAZIO");
                    } else {
                        alertify.error("VENDA NÃO REALIZADA");
                    }
                }
            });
        }
    </script>

    <style>
        .cabecalho {
            margin-bottom: 50px;
        }
    </style>

<?php
} else {
    header("location:./index.php");
}
?>