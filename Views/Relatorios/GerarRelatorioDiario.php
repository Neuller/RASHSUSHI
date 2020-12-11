<?php
session_start();
if (isset($_SESSION['User'])) {
?>

<!DOCTYPE html>
<html>
	<head>
		<?php require_once "../../Classes/Conexao.php"; 
		$c = new conectar();
		$conexao = $c -> conexao();
		?>
    </head>
	<body>
		<div class="container">
			<div class="cabecalho bgGradient">
				<div class="text-center textCabecalho_White opacidade">
					<h3><strong>RELATÓRIO DIÁRIO</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmRelatorioDiario">
					    <!-- DATA -->
						<div class="col-md-4 col-sm-4 col-xs-4 itensFormulario">
							<div>
								<label>DATA DE REFERÊNCIA</label>
                                <input type="text" readonly class="form-control input-sm align text-uppercase" id="data" name="data">
							</div>
						</div>
						<!-- BOTÂO CADASTRAR -->
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario btnLeft">
							<span class="btn btn-success" id="btnGerar" title="GERAR RELATÓRIO DIÁRIO">GERAR</span>
					    </div>
	    			</form>
				</div>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">
$(document).ready(function($) {
	moment.locale('pt-br');
    var data = moment().format('DD/MM/YYYY');
	$("#data").val(data);
});

$('#btnGerar').click(function() {
	var data = $("#data").val();
	$.ajax({
		type: "POST",
        data: "data=" + data,
        url: "./Procedimentos/Financeiro/VerificarStatusCaixa.php",
        success: function(r) {
			retorno = $.parseJSON(r);
			if (retorno == "FECHADO") {
				$('#frmRelatorioDiario')[0].reset();
				window.open("./Procedimentos/Relatorios/CriarRelatorioDiario.php?data=" + data);
                alertify.success("RELATÓRIO GERADO");
				$('#conteudo').load("./Views/Inicio/Inicio.php");	
        	} else {
				alertify.error("VERIFIQUE O STATUS DO CAIXA");
      		}
        }
	});
});
</script>
<?php
} else {
	header("location:./index.php");
}
?>