<link rel="stylesheet" type="text/css" href="./Css/Formularios.css">
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
					<div class="modal-body">
						<form id="frmClientesView">
								<!-- FORMULÁRIO DADOS PESSOAIS -->
								<div class='col-md-12 col-sm-12 col-xs-12 tituloFormulario'>
									<div class="text-left">
										<h4><strong>DADOS PESSOAIS</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
									</div>
									<hr>
								</div>
								<!-- ID CLIENTE -->
								<div>
									<input type="text" hidden="" id="idClienteV" name="idClienteV">
								</div>
								<!-- NOME -->
								<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormulario">
									<div>
										<label>NOME COMPLETO</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="nomeV" name="nomeV">
									</div>
								</div>
								<!-- CPF -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>CPF</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="cpfV" name="cpfV">
									</div>
								</div>
								<!-- CNPJ -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>CNPJ</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="cnpjV" name="cnpjV">
									</div>
								</div>
								<!-- E-MAIL -->
								<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormulario">
									<div>
										<label>E-MAIL</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="emailV" name="emailV">
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
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>CEP</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="cepV" name="cepV">
									</div>
								</div>
								<!-- BAIRRO -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>BAIRRO</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="bairroV" name="bairroV">
								</div>
								</div>
								<!-- ENDEREÇO -->
								<div class="mb-20px col-md-8 col-sm-8 col-xs-8 itensFormulario">
									<div>
										<label>ENDEREÇO</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="enderecoV" name="enderecoV">
									</div>
								</div>
									<!-- UF -->
								<div class="mb-20px col-md-4 col-sm-4 col-xs-4 itensFormulario">
									<div>
										<label>UF</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="ufV" name="ufV">
									</div>
								</div>
								<!-- NÚMERO -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>NÚMERO</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="numeroV" name="numeroV">
									</div>
								</div>
								<!-- COMPLEMENTO -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>COMPLEMENTO</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="complementoV" name="complementoV">
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
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>TELEFONE</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="telefoneV" name="telefoneV">
									</div>
								</div>
								<!-- CELULAR -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>CELULAR</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="celularV" name="celularV">
									</div>
								</div>		
								<!-- TELEFONE 2 -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>TELEFONE</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="telefone2V" name="telefone2V">
									</div>
								</div>
								<!-- CELULAR 2 -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
										<label>CELULAR</label>
										<input readonly type="text" class="form-control input-sm align text-uppercase" id="celular2V" name="celular2V">
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
