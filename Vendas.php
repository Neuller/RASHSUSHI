<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <!-- MENU -->
        <?php require_once "./Classes/Conexao.php";
        $c = new conectar();
        $conexao = $c->conexao();
        ?>
        <?php require_once "./Menu.php"; ?>
    </head>

    <body>
        <div class="tblVendas container">
            <!-- CABEÇALHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>TABELA DE VENDAS</strong></h3>
                </div>
            </div>
            <!-- TABELA DE SERVIÇOS -->
			<div class="row">
				<div class="col-sm-12" align="center">
					<div id="tabelaVendas"></div>
				</div>
			</div>
        </div>
    </body>

    </html>

    <!-- SCRIPT -->
	<script type="text/javascript">
		// CARREGAR TABELA
		$(document).ready(function() {
            $('#tabelaVendas').load('./Views/Vendas/TabelaVendas.php');
        });
    </script>
    <style>
		.mb-20px {
			margin-bottom: 20px;
		}

		.mb-15px {
			margin-bottom: 15px;
		}

		.cabecalho {
			margin-bottom: 50px;
		}
	</style>
<!-- SE NÂO ESTIVAR LOGADO RETORNA À PÁGINA INICIAL -->
<?php
} else {
    header("location:./index.php");
}
?>