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

		$sql = "SELECT ID_Status, Nome_Status FROM status";

		$result = mysqli_query($conexao, $sql);
		?>
		<?php require_once "./Menu.php"; ?>
	</head>

	<body>
		<div class="container">
			<!-- FALE CONOSCO -->
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>FALE CONOSCO</strong></h3>
				</div>
			</div>
			<!-- TELEFONES -->
			<div class="contatos">
				<article class="conteudo bgGradientFaleConosco">
					<div class="text-center">
						<section class="conteudoContatos">
							<i class="fas fa-phone fa-4x textContatos"></i>
						</section>
					</div>
					<div class="text-center">
						<section class="conteudoContatos">
							<div class="text-center">
								<p class="h5 textContatos">(31) 3390-1115</p>
								<p class="h5 textContatos">(31) 3043-4397</p>
							</div>
						</section>
					</div>
				</article>
			</div>
			<!-- CELULARES -->
			<div class="contatos">
				<article class="conteudo bgGradientFaleConosco">
					<div class="text-center">
						<section class="conteudoContatos">
							<i class="fab fa-whatsapp fa-4x textContatos"></i>
						</section>
					</div>
					<div class="text-center">
						<section class="conteudoContatos">
							<div class="text-center">
								<p class="h5 textContatos">(31) 9 9392-0260</p>
								<p class="h5 textContatos">(31) 9 9165-4448</p>
								<p class="h5 textContatos">(31) 9 9246-6484</p>
							</div>
						</section>
					</div>
				</article>
			</div>
			<!-- ENDEREÇO -->
			<div class="contatos">
				<article class="conteudo bgGradientFaleConosco">
					<div class="text-center">
						<section class="conteudoContatos">
							<i class="fas fa-home fa-4x textContatos"></i>
						</section>
					</div>
					<div class="text-center">
						<section class="conteudoContatos">
							<div class="text-center">
								<p class="h5 textContatos">Rua Cel. João Camargos - 255</p>
								<p class="h5 textContatos">LOJA 01 - Contagem/MG</p>
							</div>
						</section>
					</div>
				</article>
			</div>
			<!-- E-MAIL -->
			<div class="contatos">
				<article class="conteudo bgGradientFaleConosco">
					<div class="text-center">
						<section class="conteudoContatos">
							<i class="fas fa-envelope fa-4x textContatos"></i>
						</section>
					</div>
					<div class="text-center">
						<section class="conteudoContatos">
							<div class="text-center">
								<p class="h5 textContatos">Nserv@hotmail.com</p>
							</div>
						</section>
					</div>
				</article>
			</div>
			<!-- SERVIÇOS DO MÊS -->
			<div>
				<div class="servicosMes bgGray">
					<div class="text-center textCabecalho opacidade">
						<h3><strong>SERVIÇOS DO MÊS</strong></h3>
					</div>
				</div>
				<!-- TABELA DE SERVIÇOS -->
				<div class="row">
					<div class="col-sm-12" align="center">
						<div id="tabelaUltimosServicos"></div>
					</div>
				</div>
			</div>
			<!-- VENDAS DO MÊS -->
			<div>
				<div class="vendasMes bgGray">
					<div class="text-center textCabecalho opacidade">
						<h3><strong>VENDAS DO MÊS</strong></h3>
					</div>
				</div>
				<!-- TABELA DE VENDAS -->
				<div class="row">
					<div class="col-sm-12" align="center">
						<div id="tabelaVendasMes"></div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- MODAL EDITAR SERVIÇO -->									
		<div id="modalEditarServico"></div>

		<!-- MODAL VISUALIZAR SERVIÇO -->								
		<div id="modalVisualizarServico"></div>

	</body>
	</html>

<!-- SCRIPT -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabelaUltimosServicos').load('./Views/Inicio/tabelaUltimosServicos.php');
		$('#tabelaVendasMes').load('./Views/Inicio/tabelaVendasMes.php');
		$('#modalVisualizarServico').load('./Views/Servicos/ModalVisualizarServico.php');
		$('#modalEditarServico').load('./Views/Servicos/ModalEditarServico.php');
		// PERSONALIZAÇÃO DE CAMPOS
		$('.dataSaida').mask('99/99/9999');
		$('.valorTotal').mask('9999999999');
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
				$('#selectStatusU').val(dado['ID_Status']);
				$('#informacaoU').val(dado['Info']);
				$('#servicoU').val(dado['Servico']);
				$('#tecnicoU').val(dado['idTecnico']);
				$('#garantiaU').val(dado['Garantia']);
				$('#precoU').val(dado['Preco']);
				$('#dataSaidaU').val(dado['DataSaida']);
				$('#diagnosticoU').val(dado['Diagnostico']);
				// VERIFICAR NF-E
				var $radios = $('input:radio[name = nfeEmitidaU]');
				if(dado['NF_Emitida'] === "NAO"){							
					$radios.filter('[value = NAO]').prop('checked', true);
					console.log("NOTA FISCAL NÃO EMITIDA.");	
				}else if(dado['NF_Emitida'] === "SIM"){					
					$radios.filter('[value = SIM]').prop('checked', true);
					console.log("NOTA FISCAL JÁ EMITIDA.");
				}else{
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
				$('#idServicoView').val(dado['ID_Servico']);
				$('#equipamentoView').val(dado['Equipamento']);
				$('#serialNumberView').val(dado['SerialNumber']);
				// NOME DO STATUS
				$.ajax({
					type : "POST",
					data: "idStatus=" + dado.ID_Status,			
					url : './Procedimentos/Utilitarios/ObterNomeStatus.php',
				}).then(function(data){			
					var nomeStatus = JSON.parse(data);
					$('#selectStatusView').val(nomeStatus);
				});
				// NOME DO TECNICO
				$.ajax({
					type : "POST",
					data: "idTecnico=" + dado.idTecnico,			
					url : './Procedimentos/Utilitarios/ObterNomeTecnico.php',
				}).then(function(data){			
					var nomeTecnico = JSON.parse(data);
					$('#tecnicoView').val(nomeTecnico);
				});
				$('#informacaoView').val(dado['Info']);
				$('#diagnosticoView').val(dado['Diagnostico']);
				$('#servicoView').val(dado['Servico']);
				$('#garantiaView').val(dado['Garantia']);
				$('#precoView').val(dado['Preco']);
				$('#dataSaidaView').val(dado['DataSaida']);
				// VERIFICAR NF-E
				var $radios = $('input:radio[name = nfeEmitidaView]');
				if(dado['NF_Emitida'] === "NAO"){							
					$radios.filter('[value = NAO]').prop('checked', true);
					console.log("NOTA FISCAL NÃO EMITIDA.");	
				}else if(dado['NF_Emitida'] === "SIM"){					
					$radios.filter('[value = SIM]').prop('checked', true);
					console.log("NOTA FISCAL JÁ EMITIDA.");
				}else{
					$radios.filter('[value = NAO]').prop('checked', true);
					console.log("NÃO FOI POSSÍVEL IDENTIFICAR EMISSÃO DE NOTA.");
				}
			}
		});
	}
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