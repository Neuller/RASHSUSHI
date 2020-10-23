<?php
session_start();
if (isset($_SESSION['User'])) {
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./Css/Inicio.css">
		<?php require_once "../../Classes/Conexao.php";
		$c = new conectar();
		$conexao = $c -> conexao();
		?>
	</head>

	<body>
		<div class="container">
			<!-- FALE CONOSCO -->
			<div class="cabecalho bgGradient">
				<div class="text-center textCabecalho_White opacidade">
					<h3><strong>FALE CONOSCO</strong></h3>
				</div>
			</div>

			<div class="faleConosco">
				<!-- CELULARES -->
				<div class="contatos">
					<article class="conteudo bgGradientLinear">
						<div class="text-center">
							<section class="conteudoContatos">
								<i class="fab fa-whatsapp fa-4x textContatos"></i>
							</section>
						</div>
						<div class="text-center">
							<section class="conteudoContatos">
								<div class="text-center">
									<p class="h5 textContatos">(31) 9 9344-0749</p>
								</div>
							</section>
						</div>
					</article>
				</div>
				<!-- ENDEREÇO -->
				<div class="contatos">
					<article class="conteudo bgGradientLinear">
						<div class="text-center">
							<section class="conteudoContatos">
								<i class="fas fa-home fa-4x textContatos"></i>
							</section>
						</div>
						<div class="text-center">
							<section class="conteudoContatos">
								<div class="text-center">
									<p class="h5 textContatos">Rua dos Antúrios - 293</p>
									<p class="h5 textContatos">Sapucaias - Contagem/MG</p>
								</div>
							</section>
						</div>
					</article>
				</div>
				<!-- E-MAIL -->
				<div class="contatos">
					<article class="conteudo bgGradientLinear">
						<div class="text-center">
							<section class="conteudoContatos">
								<i class="fas fa-envelope fa-4x textContatos"></i>
							</section>
						</div>
						<div class="text-center">
							<section class="conteudoContatos">
								<div class="text-center">
									<p class="h5 textContatos">andre.dekooh@hotmail.com</p>
								</div>
							</section>
						</div>
					</article>
				</div>
			</div>

			<!-- PEDIDOS DO MÊS -->
			<div>
				<div class="pedidosMes cabecalho bgGradient">
					<div class="text-center textCabecalho_White opacidade">
						<h3><strong>PEDIDOS DO MÊS</strong></h3>
					</div>
				</div>
				<!-- TABELA -->
				<div >
					<div class="col-sm-12" align="center">
						<div id="tabelaPedidosMes"></div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">
		$(document).ready(function() {
			$('#tabelaPedidosMes').load('./Views/Inicio/TabelaPedidosMes.php');
		});
		// MODAL EDITAR SERVIÇOS
		function adicionarDados(idServico) {
			$.ajax({
				type: "POST",
				data: "idServico=" + idServico,
				url: "./Procedimentos/Servicos/ObterDadosServicos.php",
				success: function(r) {
					dado = jQuery.parseJSON(r);
					$('#idServico').val(dado['ID_Servico']);
					// VERIFICA STATUS
					var identificadorStatus = dado['ID_Status'];
					if ((identificadorStatus === "0") || (identificadorStatus === "") || (identificadorStatus === null)) {
						$("#selectStatusU").val("0");
					} else {
						$('#selectStatusU').val(identificadorStatus);
					}
					$('#informacaoU').val(dado['Info']);
					$('#ordemServicoU').val(dado['ordemServico']);
					$('#servicoU').val(dado['Servico']);
					// VERIFICA TÉCNICO RESPONSÁVEL
					var identificadorTecnico = dado['idTecnico'];
					if ((identificadorTecnico === "0") || (identificadorTecnico === "") || (identificadorTecnico === null)) {
						$("#tecnicoU").val("0");
					} else {
						$('#tecnicoU').val(identificadorTecnico);
					}
					$('#garantiaU').val(dado['Garantia']);
					$('#precoU').val(dado['Preco']);
					$('#valorTerceiroU').val(dado['valorTerceiro']);
					$('#dataSaidaU').val(dado['DataSaida']);
					$('#diagnosticoU').val(dado['Diagnostico']);
					// VERIFICAR NF-E
					var $radios = $('input:radio[name = nfeEmitidaU]');
					if (dado['NF_Emitida'] === "NAO") {
						$radios.filter('[value = NAO]').prop('checked', true);
						console.log("NOTA FISCAL NÃO EMITIDA.");
					} else if (dado['NF_Emitida'] === "SIM") {
						$radios.filter('[value = SIM]').prop('checked', true);
						console.log("NOTA FISCAL JÁ EMITIDA.");
					} else {
						$radios.filter('[value = NAO]').prop('checked', true);
						console.log("NÃO FOI POSSÍVEL IDENTIFICAR EMISSÃO DE NOTA.");
					}
				}
			});
		}
		// MODAL VISUALIZAR SERVIÇOS
		function visualizarDados(idServico) {
			$.ajax({
				type: "POST",
				data: "idServico=" + idServico,
				url: "./Procedimentos/Servicos/ObterDadosServicos.php",
				success: function(r) {
					dado = jQuery.parseJSON(r);
					// DADOS CLIENTE
					$.ajax({
						type: "POST",
						data: "idCliente=" + dado.ID_Cliente,
						url: './Procedimentos/Utilitarios/ObterDadosResumidoCliente.php',
					}).then(function(data) {
						var result = JSON.parse(data);
						var nomeCliente = result[0];
						var telefoneCliente = result[1];
						var celularCliente = result[2];
						$('#clienteView').val(nomeCliente);
						$('#telefoneClienteView').val(telefoneCliente);
						$('#celularClienteView').val(celularCliente);
					});
					$('#idServicoView').val(dado['ID_Servico']);
					$('#equipamentoView').val(dado['Equipamento']);
					$('#ordemServicoView').val(dado['ordemServico']);
					$('#serialNumberView').val(dado['SerialNumber']);
					// NOME DO STATUS
					$.ajax({
						type: "POST",
						data: "idStatus=" + dado.ID_Status,
						url: './Procedimentos/Utilitarios/ObterNomeStatus.php',
					}).then(function(data) {
						var nomeStatus = JSON.parse(data);
						$('#selectStatusView').val(nomeStatus);
					});
					// NOME DO TECNICO
					$.ajax({
						type: "POST",
						data: "idTecnico=" + dado.idTecnico,
						url: './Procedimentos/Utilitarios/ObterNomeTecnico.php',
					}).then(function(data) {
						var nomeTecnico = JSON.parse(data);
						$('#tecnicoView').val(nomeTecnico);
					});
					$('#informacaoView').val(dado['Info']);
					$('#diagnosticoView').val(dado['Diagnostico']);
					$('#servicoView').val(dado['Servico']);
					$('#garantiaView').val(dado['Garantia']);
					$('#precoView').val(dado['Preco']);
					$('#valorTerceiroView').val(dado['valorTerceiro']);
					$('#dataSaidaView').val(dado['DataSaida']);
					// VERIFICAR NF-E
					var $radios = $('input:radio[name = nfeEmitidaView]');
					if (dado['NF_Emitida'] === "NAO") {
						$radios.filter('[value = NAO]').prop('checked', true);
						console.log("NOTA FISCAL NÃO EMITIDA.");
					} else if (dado['NF_Emitida'] === "SIM") {
						$radios.filter('[value = SIM]').prop('checked', true);
						console.log("NOTA FISCAL JÁ EMITIDA.");
					} else {
						$radios.filter('[value = NAO]').prop('checked', true);
						console.log("NÃO FOI POSSÍVEL IDENTIFICAR EMISSÃO DE NOTA.");
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
	header("location: ./index.php");
}
?>