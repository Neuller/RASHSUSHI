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
		<div class="tblServicos container">
			<!-- CABEÇALHO -->
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>TABELA DE SERVIÇOS</strong></h3>
				</div>
			</div>
			<!-- TABELA DE SERVIÇOS -->
			<div class="row">
				<div class="col-sm-12" align="center">
					<div id="tabelaServicosEntrada"></div>
				</div>
			</div>
		</div>
		<!-- MODAL EDIÇÃO -->
		<div class="modal fade" id="atualizarServico" tabindex="-1" role="dialog" aria-labelledby="modalEditar">
			<div class="modal-dialog modal-lg" role="document" data-keyboard="true">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="modal-content col-md-12 col-sm-12 col-xs-12">
						<!-- TÍTULO -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">EDITAR</h4>
						</div>
						<!-- FORMULÁRIO -->
						<div class="modal-body">
							<form id="frmServicoU">
								<!-- ID -->
								<div>
									<input type="text" hidden="" id="idServico" name="idServico">
								</div>
								<!-- FORMULÁRIO INFORMAÇÕES DO EQUIPAMENTO / SERVIÇO -->
								<div class='col-md-12 col-sm-12 col-xs-12 separador'>
									<div class="text-left">
										<h4><strong>INFORMAÇÕES DO EQUIPAMENTO E SERVIÇO</strong><span class="glyphicon glyphicon-wrench ml-15"></span></h4>
									</div>
									<hr>
								</div>
								<!-- STATUS -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>STATUS DO SERVIÇO<span class="required">*</span></label>
										<select class="form-control input-sm" id="selectStatusU" name="selectStatusU">
											<option value="">SELECIONE UM STATUS</option>
											<?php
											$sql = "SELECT ID_Status, Nome_Status FROM status";
											$result = mysqli_query($conexao, $sql);

											while ($Nome = mysqli_fetch_row($result)) :
											?>
												<option value="<?php echo $Nome[0] ?>"><?php echo $Nome[1] ?></option>
											<?php endwhile; ?>
										</select>
									</div>
								</div>
								<!-- TÉCNICO -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>TÉCNICO<span class="required">*</span></label>
										<select class="form-control input-sm" id="tecnicoU" name="tecnicoU">
											<option value="">SELECIONE UM TECNICO</option>
											<?php
											$sql = "SELECT idTecnico, nome 
										FROM tecnicos";
											$result = mysqli_query($conexao, $sql);
											?>
											<?php while ($mostrar = mysqli_fetch_row($result)) : ?>
												<option value="<?php echo $mostrar[0]; ?>"><?php echo $mostrar[1]; ?></option>
											<?php endwhile; ?>
										</select>
									</div>
								</div>
								<!-- OBSERVAÇÕES -->
								<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
									<div>
										<label>OBSERVAÇÕES</label>
										<textarea type="text" class="form-control input-sm text-uppercase" id="informacaoU" name="informacaoU" maxlength="100" rows="3" style="resize: none"></textarea>
									</div>
								</div>
								<!-- DIAGNÓSTICO -->
								<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
									<div>
										<label>DIAGNÓSTICO TÉCNICO<span class="required">*</span></label>
										<textarea type="text" class="form-control text-uppercase input-sm" id="diagnosticoU" name="diagnosticoU" maxlength="100" rows="3" style="resize: none"></textarea>
									</div>
								</div>
								<!-- SERVIÇO EXECUTADO -->
								<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
									<div>
										<label>SERVIÇO(s) EXECUTADO(s)</label>
										<textarea type="text" class="form-control text-uppercase input-sm" id="servicoU" name="servicoU" maxlength="100" rows="3" style="resize: none"></textarea>
									</div>
								</div>
								<!-- DATA DE ENTREGA -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>DATA DE ENTREGA</label>
										<input type="text" class="form-control text-uppercase dataSaida input-sm" id="dataSaidaU" name="dataSaidaU" maxlength="10">
									</div>
								</div>
								<!-- GARANTIA -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>GARANTIA</label>
										<select class="form-control text-uppercase input-sm" id="garantiaU" name="garantiaU" maxlength="100">
											<option value="">SELECIONE UMA GARANTIA</option>
											<option value="FUNCIONAL">FUNCIONAL</option>
											<option value="30 DIAS">30 DIAS</option>
											<option value="90 DIAS">90 DIAS</option>
											<option value="06 MESES">06 MESES</option>
											<option value="12 MESES">12 MESES</option>
										</select>
									</div>
								</div>
								<!-- VALOR TOTAL -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>VALOR TOTAL</label>
										<input type="text" class="form-control text-uppercase valorTotal input-sm" id="precoU" name="precoU" maxlength="10">
									</div>
								</div>
								<!-- VAZIA -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
									</div>
								</div>
								<!-- BOTÃO EDITAR -->
								<div class="btnEditar">
									<span class="btn btn-warning" id="btnEditar" title="Editar" data-dismiss="modal">EDITAR</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- MODAL VISUALIZAR -->
		<div class="modal fade" id="visualizarServico" tabindex="-1" role="dialog" aria-labelledby="modalVisualizar">
			<div class="modal-dialog modal-lg" role="document" data-keyboard="true">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="modal-content col-md-12 col-sm-12 col-xs-12">
						<!-- TÍTULO -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">VISUALIZAR</h4>
						</div>
						<!-- FORMULÁRIO	-->
						<div class="modal-body">
							<form id="frmVisualizaServico">
								<!-- ID -->
								<div>
									<input readonly type="text" hidden="" id="idServicoView" name="idServicoView">
								</div>
								<!-- FORMULÁRIO INFORMAÇÕES DO EQUIPAMENTO / SERVIÇO -->
								<div class='col-md-12 col-sm-12 col-xs-12 separador'>
									<div class="text-left">
										<h4><strong>INFORMAÇÕES DO EQUIPAMENTO E SERVIÇO</strong><span class="glyphicon glyphicon-wrench ml-15"></span></h4>
									</div>
									<hr>
								</div>
								<!-- EQUIPAMENTO -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>EQUIPAMENTO / MARCA / MODELO</label>
										<input type="text" readonly class="form-control input-sm" id="equipamentoView" name="equipamentoView">
									</div>
								</div>
								<!-- NÚMERO DE SÉRIE -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>NÚMERO DE SÉRIE</label>
										<input type="text" readonly class="form-control input-sm" id="serialNumberView" name="serialNumberView">
									</div>
								</div>
								<!-- STATUS -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>STATUS DO SERVIÇO</label>
										<input class="form-control input-sm" readonly id="selectStatusView" name="selectStatusView"></input>
									</div>
								</div>
								<!-- TÉCNICO -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>TÉCNICO</label>
										<input class="form-control input-sm" readonly id="tecnicoView" name="tecnicoView"></input>
									</div>
								</div>
								<!-- OBSERVAÇÕES -->
								<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
									<div>
										<label>OBSERVAÇÕES</label>
										<textarea type="text" readonly class="form-control input-sm text-uppercase" id="informacaoView" name="informacaoView" rows="3" style="resize: none"></textarea>
									</div>
								</div>
								<!-- DIAGNÓSTICO -->
								<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
									<div>
										<label>DIAGNÓSTICO TÉCNICO</label>
										<textarea type="text" readonly class="form-control input-sm" id="diagnosticoView" name="diagnosticoView" rows="3" style="resize: none"></textarea>
									</div>
								</div>
								<!-- SERVIÇO EXECUTADO -->
								<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
									<div>
										<label>SERVIÇO(s) EXECUTADO(s)</label>
										<textarea type="text" readonly class="form-control input-sm" id="servicoView" name="servicoView" rows="3" style="resize: none"></textarea>
									</div>
								</div>
								<!-- DATA DE ENTREGA -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>DATA DE ENTREGA</label>
										<input type="text" readonly class="form-control input-sm" id="dataSaidaView" name="dataSaidaView">
									</div>
								</div>
								<!-- GARANTIA -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>GARANTIA</label>
										<input type="text" readonly class="form-control input-sm" id="garantiaView" name="garantiaView"></input>
									</div>
								</div>
								<!-- VALOR TOTAL -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>VALOR TOTAL</label>
										<input type="number" readonly class="form-control input-sm" id="precoView" name="precoView">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</body>

	</html>
	<!-- SCRIPT -->
	<script type="text/javascript">
		// CARREGAR TABELA
		$(document).ready(function() {
			$('#tabelaServicosEntrada').load('./Views/Servicos/TabelaServicos.php');
			$('.dataSaida').mask('99/99/9999');
			$('.valorTotal').mask('9999999999');
			
			$('#btnEditar').click(function() {
				// VALIDAR CAMPOS
				var diagnostico = frmServicoU.diagnosticoU.value;
				var tecnico = frmServicoU.tecnicoU.value;

				if (diagnostico == "" || tecnico == "") {
					alertify.error("Preencha o(s) campo(s) obrigatório(s)");
					return false;
				}

				dados = $('#frmServicoU').serialize();
				$.ajax({
					type: "POST",
					data: dados,
					url: "./Procedimentos/Servicos/AtualizarServicos.php",
					success: function(r) {
						if (r == 1) {
							$('#tabelaServicosEntrada').load("./Views/Servicos/TabelaServicos.php");
							alertify.success("Registro atualizado com sucesso");
						} else {
							alertify.error("Não foi possível atualizar");
						}
					}
				});
			});
		});
		// PREENCHER MODAL DE EDIÇÂO
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
				}
			});
		}
		// VISUALIZAR
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
					$('#selectStatusView').val(dado['ID_Status']);
					$('#tecnicoView').val(dado['idTecnico']);
					$('#informacaoView').val(dado['Info']);
					$('#diagnosticoView').val(dado['Diagnostico']);
					$('#servicoView').val(dado['Servico']);
					$('#garantiaView').val(dado['Garantia']);
					$('#precoView').val(dado['Preco']);
					$('#dataSaidaView').val(dado['DataSaida']);
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