<div class="container">
	<div class="cabecalho bgGradient">
		<div class="text-center textCabecalho_White opacidade">
			<h3><strong>VISUALIZAR CLIENTE</strong></h3>
		</div>
	</div>
	<div id="visualizarCliente" tabindex="-1" role="dialog" aria-labelledby="modalVisualizar">
		<div class="modal-dialog modal-lg" role="document" data-keyboard="true">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="modal-content col-md-12 col-sm-12 col-xs-12">
					<div class="modal-header">
						<button type="button" id="btnClose" class="close" data-dismiss="modal" aria-label="Close" title="FECHAR"><span aria-hidden="true">&times;</span></button>
					</div>
					<!-- FORMULÁRIO -->
					<div class="modal-body">
						<form id="frmClientesView">
									<!-- FORMULÁRIO DADOS PESSOAIS -->
									<div class='col-md-12 col-sm-12 col-xs-12'>
										<div class="text-left">
											<h4><strong>DADOS PESSOAIS</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
										</div>
										<hr>
									</div>
									<!-- ID -->
									<div>
										<input type="text" hidden="" id="idclienteView" name="idclienteView">
									</div>
									<!-- NOME -->
									<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
										<div>
											<label>NOME COMPLETO</label>

											<input readonly type="text" class="form-control input-sm align text-uppercase" id="nomeView" name="nomeView">
										</div>
									</div>
									<!-- CPF -->
									<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
										<div>
											<label>CPF</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="cpfView" name="cpfView">
										</div>
									</div>
									<!-- CNPJ -->
									<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
										<div>
											<label>CNPJ</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="cnpjView" name="cnpjView">
										</div>
									</div>
									<!-- E-MAIL -->
									<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
										<div>
											<label>E-MAIL</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="emailView" name="emailView">
										</div>
									</div>

									<!-- FORMULÁRIO ENDEREÇO -->
									<div class='separador col-md-12 col-sm-12 col-xs-12'>
										<div class="text-left">
											<h4><strong>ENDEREÇO</strong><span class="glyphicon glyphicon-home ml-15"></span></h4>
										</div>
										<hr>
									</div>
									<!-- CEP -->
									<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
										<div>
											<label>CEP</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="cepView" name="cepView">
										</div>
									</div>
									<!-- BAIRRO -->
									<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
										<div>
											<label>BAIRRO</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="bairroView" name="bairroView">
										</div>
									</div>
									<!-- ENDEREÇO -->
									<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
										<div>
											<label>ENDEREÇO</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="enderecoView" name="enderecoView">
										</div>
									</div>
									<!-- NÚMERO -->
									<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
										<div>
											<label>NÚMERO</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="numeroView" name="numeroView">
										</div>
									</div>
									<!-- COMPLEMENTO -->
									<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
										<div>
											<label>COMPLEMENTO</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="complementoView" name="complementoView">
										</div>
									</div>

									<!-- FORMULÁRIO TELEFONES -->
									<div class='separador col-md-12 col-sm-12 col-xs-12'>
										<div class="text-left">
											<h4><strong>TELEFONES</strong><span class="glyphicon glyphicon-phone-alt ml-15"></span></h4>
										</div>
										<hr>
									</div>
									<!-- TELEFONE -->
									<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
										<div>
											<label>TELEFONE</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="telefoneView" name="telefoneView">
										</div>
									</div>
									<!-- CELULAR -->
									<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
										<div>
											<label>CELULAR</label>
											<input readonly type="text" class="form-control input-sm align text-uppercase" id="celularView" name="celularView">
									</div>
							</div>						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#btnClose').click(function() {
		$('#conteudo').load("./Views/Clientes/ProcurarClientes.php");	
	});
</script>
<style>
	.cabecalho {
		margin-bottom: 50px;
	}
</style>
