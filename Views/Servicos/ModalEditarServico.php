<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>
	<?php require_once "../../Classes/Conexao.php";
	$c = new conectar();
	$conexao = $c->conexao();
	$sql = "SELECT ID_Status, Nome_Status FROM status";
	$result = mysqli_query($conexao, $sql);
	?>
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
							<!-- DIAGNÓSTICO -->
							<div class='col-md-12 col-sm-12 col-xs-12 separador itensFormularioCadastro'>
								<div>
									<h4><strong>DIAGNÓSTICO TÉCNICO</strong><span class="glyphicon glyphicon-file ml-15"></span></h4>
									<hr>
									<textarea type="text" class="form-control text-uppercase input-sm" id="diagnosticoU" name="diagnosticoU" maxlength="1000" rows="3" style="resize: none"></textarea>
								</div>
							</div>
							<!-- TÉCNICO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro" id="divTecnico">
								<div id="divTecnico2">
									<label>TÉCNICO</label>
									<select class="form-control input-sm" id="tecnicoU" name="tecnicoU">
										<option value="0">SELECIONE UM TECNICO</option>
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
							<!-- FORMULÁRIO INFORMAÇÕES DO EQUIPAMENTO / SERVIÇO -->
							<div class='col-md-12 col-sm-12 col-xs-12 separador'>
								<div class="text-left">
									<h4><strong>INFORMAÇÕES DO EQUIPAMENTO E SERVIÇO</strong><span class="glyphicon glyphicon-wrench ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- ORDEM DE SERVIÇO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>ORDEM DE SERVIÇO</label>
									<input type="number" class="form-control text-uppercase input-sm" id="ordemServicoU" name="ordemServicoU" maxlength="10">
								</div>
							</div>
							<!-- STATUS -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>STATUS DO SERVIÇO<span class="required">*</span></label>
									<select class="form-control input-sm" id="selectStatusU" name="selectStatusU">
										<option value="0">SELECIONE UM STATUS</option>
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
							<!-- OBSERVAÇÕES -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
									<label>OBSERVAÇÕES</label>
									<textarea type="text" class="form-control input-sm text-uppercase" id="informacaoU" name="informacaoU" maxlength="100" rows="3" style="resize: none"></textarea>
								</div>
							</div>
							<!-- SERVIÇO EXECUTADO -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
									<label>SERVIÇO(s) EXECUTADO(s)</label>
									<textarea type="text" class="form-control text-uppercase input-sm" id="servicoU" name="servicoU" maxlength="1000" rows="3" style="resize: none"></textarea>
								</div>
							</div>
							<!-- VALOR DE TERCEIRO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>VALOR DE TERCEIRO</label>
									<input type="text" class="form-control text-uppercase valorTerceiro input-sm" id="valorTerceiroU" name="valorTerceiroU" maxlength="10">
								</div>
							</div>
							<!-- VALOR TOTAL -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>VALOR TOTAL</label>
									<input type="text" class="form-control text-uppercase valorTotal input-sm" id="precoU" name="precoU" maxlength="10">
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
							<!-- DATA DE ENTREGA -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>DATA DE ENTREGA</label>
									<input type="text" class="form-control text-uppercase dataSaida input-sm" id="dataSaidaU" name="dataSaidaU" maxlength="10">
								</div>
							</div>
							<!-- NF-E EMITIDA? -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>NF-E EMITIDA?</label>
								</div>
								<form id="nfeEmitidaForm">
									<input type="radio" class="custom-control-input" id="nfeEmitidaU" name="nfeEmitidaU" value="NAO" checked>
									<label class="custom-control-label btnRadio">NÃO</label>
									<input type="radio" class="custom-control-input" id="nfeEmitidaU" name="nfeEmitidaU" value="SIM">
									<label class="custom-control-label btnRadio">SIM</label>
								</form>
							</div>
							<!-- VAZIA -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
								</div>
							</div>
							<!-- BOTÃO EDITAR -->
							<div class="btnEditar">
								<span class="btn btn-warning" id="btnEditar" title="EDITAR" data-dismiss="modal">EDITAR</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.dataSaida').mask('99/99/9999');
		});
		$('#btnEditar').click(function() {
			var statusServico = frmServicoU.selectStatusU.value;
			if (statusServico == 0) {
				alertify.error("PREENCHA OS CAMPOS OBRIGATÓRIOS");
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
						$('#tabelaUltimosServicos').load('./Views/Inicio/tabelaUltimosServicos.php');
						alertify.success("REGISTRO ATUALIZADO");
					} else {
						alertify.error("NÃO FOI POSSÍVEL ATUALIZAR");
					}
				}
			});
		});
	</script>
<?php
} else {
	header("location: ./index.php");
}
?>