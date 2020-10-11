<?php
session_start();
if (isset($_SESSION['User'])) {
?>

<!DOCTYPE html>
<html>
	<body>
		<div class="container">
			<div class="cabecalho bgGradient">
				<div class="text-center textCabecalho_White opacidade">
					<h3><strong>CADASTRAR VEÍCULO</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmVeiculo">
						<div>
							<!-- FORMULÁRIO VEÍCULO -->
							<div class='col-md-12 col-sm-12 col-xs-12'>
								<div class="text-left">
									<h4><strong>DADOS DO VEÍCULO</strong><i class="fa fa-lg fa-motorcycle ml-15"></i></h4>
								</div>
								<hr>
							</div>
							<!-- MARCA/MODELO -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
									<label>MARCA/MODELO</label>
									<input type="text" class="form-control input-sm text-uppercase" id="marca_modelo" name="marca_modelo" maxlenght="100">
								</div>
							</div>
                            <!-- ESPÉCIE -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>ESPÉCIE</label>
									<input type="text" class="form-control input-sm text-uppercase" id="especie" name="especie" maxlenght="100">
								</div>
							</div>
                            <!-- PLACA -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>PLACA</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="placa" name="placa" maxlenght="100">
								</div>
							</div>
							<!-- CHASSI -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>CHASSI</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="chassi" name="chassi" maxlenght="100">
								</div>
							</div>
							<!-- RENAVAM -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>RENAVAM</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="renavam" name="renavam" maxlenght="100">
								</div>
							</div>
                            <!-- COR -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>COR</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="cor" name="cor" maxlenght="100">
								</div>
							</div>
							<!-- BOTÂO CADASTRAR -->
							<div class="btnCadastrar">
								<span class="btn btn-primary" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
							</div>
					</form>
				</div>
			</div>
		</div>
	</body>

	</html>

	<script type="text/javascript">
		$(document).ready(function($) {
		
		});

        $('#btnCadastrar').click(function() {
            dados = $('#frmVeiculo').serialize();
            $.ajax({
                type: "POST",
                data: dados,
                url: "./Procedimentos/Veiculos/CadastrarVeiculo.php",
                success: function(r) {
                    if (r == 1) {
                        $('#frmVeiculo')[0].reset();
                        alertify.success("CADASTRO REALIZADO");
                    } else {
                        alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
                    }
                }
            }); 
        });
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