<link rel="stylesheet" type="text/css" href="./Css/Formularios.css">
<div class="container">
	<div class="cabecalho bgGradient">
		<div class="text-center textCabecalho_White opacidade">
			<h3><strong>EDITAR CLIENTE</strong></h3>
		</div>
	</div>

	<div id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditar">
		<div class="modal-dialog modal-lg" role="document" data-keyboard="true">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="modal-content col-md-12 col-sm-12 col-xs-12">
					<div class="modal-header">
						<button type="button" id="btnClose" class="close" data-dismiss="modal" aria-label="Close" title="FECHAR"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form id="frmClientesU">
							<!-- FORMULÁRIO DADOS PESSOAIS -->
							<div class='col-md-12 col-sm-12 col-xs-12 tituloFormulario'>
								<div class="text-left">
									<h4><strong>DADOS PESSOAIS</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- ID CLIENTE -->
							<div>
								<input type="text" hidden="" id="idClienteU" name="idClienteU">
							</div>
							<!-- NOME -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>NOME COMPLETO</label>
										<input type="text" class="form-control input-sm align text-uppercase" id="nomeU" name="nomeU" maxlenght="50">
								</div>
							</div>
							<!-- CPF -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CPF</label>
									<input type="text" class="form-control input-sm align cpf text-uppercase" id="cpfU" name="cpfU">
								</div>
							</div>
							<!-- CNPJ -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CNPJ</label>
									<input type="text" class="form-control input-sm align cnpj text-uppercase" id="cnpjU" name="cnpjU">
								</div>
							</div>
							<!-- E-MAIL -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>E-MAIL</label>
									<input type="text" class="form-control input-sm align text-uppercase" placeholder="exemplo@exemplo.com" id="emailU" name="emailU">
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
									<input type="text" class="form-control input-sm align cep text-uppercase" placeholder="#####-###" id="cepU" name="cepU">
								</div>
							</div>
							<!-- BAIRRO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>BAIRRO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="bairroU" name="bairroU">
								</div>
							</div>
							<!-- ENDEREÇO -->
							<div class="mb-20px col-md-8 col-sm-8 col-xs-8 itensFormulario">
								<div>
									<label>ENDEREÇO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="enderecoU" name="enderecoU">
								</div>
							</div>
							<!-- UF -->
							<div class="mb-20px col-md-4 col-sm-4 col-xs-4 itensFormulario">
								<div>
									<label>UF</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="ufU" name="ufU">
								</div>
							</div>
							<!-- NÚMERO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>NÚMERO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="numeroU" name="numeroU">
								</div>
							</div>
							<!-- COMPLEMENTO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>COMPLEMENTO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="complementoU" name="complementoU">
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
									<input type="text" class="form-control input-sm align telefone text-uppercase" placeholder="(##) ####-####" id="telefoneU" name="telefoneU">
								</div>
							</div>
							<!-- CELULAR -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CELULAR<span class="required">*</span></label>
									<input type="text" class="form-control input-sm align celular text-uppercase" placeholder="(##) # ####-####" id="celularU" name="celularU">
								</div>
							</div>
							<!-- TELEFONE 2 -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>TELEFONE</label>
									<input type="text" class="form-control input-sm align telefone text-uppercase" placeholder="(##) ####-####" id="telefone2U" name="telefone2U">
								</div>
							</div>
							<!-- CELULAR 2 -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CELULAR</label>
									<input type="text" class="form-control input-sm align celular text-uppercase" placeholder="(##) # ####-####" id="celular2U" name="celular2U">
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
</div>

<script type="text/javascript">
	$(document).ready(function($) {
		$('.cpf').mask('999.999.999-99');
		$('.cnpj').mask('99.999.999/9999-99');
		$('.cep').mask('99999-999');
		$('.telefone').mask('(99) 9999-9999');
		$('.celular').mask('(99) 9 9999-9999');

		$(".cep").change(function(){
			var cep = $("#cepU").val();
			var urlPesquisaCep = "https://viacep.com.br/ws/"+cep+"/json";
				
			$.ajax({
				type: "GET",
				dataType: "JSON",
				url: urlPesquisaCep,
				success:function(r){
					$("#bairroU").val(r.bairro);
					$("#enderecoU").val(r.logradouro);
					$("#complementoU").val(r.complemento);
					$("#ufU").val(r.uf);
					},
					error:function(){
						alertify.error("CEP INVÁLIDO");
						$("#cepU").val("");
						return false;
				}
			});
		});
	});

	$('#btnEditar').click(function() {
		var cpf = $("#cpfU").val();
		var cnpj = $("#cnpjU").val();
		var celular = $("#celularU").val();
		var tabela = "clientes";

		if (celular == "") {
			alertify.error("PREENCHA O CAMPO 'CELULAR'");
			return false;
		}

		if ((cpf != "") || (cnpj != "")){
			$.ajax({
				type: 'POST',
				data:{"CPF" : cpf, "CNPJ" : cnpj, "TABELA" : tabela},
				url: './Procedimentos/Verificacoes/Verificar_CPF_CNPJ.php', 
				success: function(r) { 
					data = $.parseJSON(r);
					if (data == 0) {
						dados = $('#frmClientesU').serialize();
							$.ajax({
							type: "POST",
							data: dados,
							url: "./Procedimentos/Clientes/EditarCliente.php",
							success: function(r) {
								if (r == 1) {
									$('#conteudo').load("./Views/Clientes/ProcurarClientes.php");
									alertify.success("REGISTRO ATUALIZADO");
								} else {
									alertify.error("NÃO FOI POSSÍVEL ATUALIZAR");
								}
							}
						});
					}else{
						alertify.error("CPF OU CNPJ JÁ CADASTRADO");
					}
				} 
			}); 
		}else{
			dados = $('#frmClientesU').serialize();
			$.ajax({
				type: "POST",
				data: dados,
				url: "./Procedimentos/Clientes/EditarCliente.php",
				success: function(r) {
					if (r == 1) {
						$('#conteudo').load("./Views/Clientes/ProcurarClientes.php");
						alertify.success("REGISTRO ATUALIZADO");
					} else {
						alertify.error("NÃO FOI POSSÍVEL ATUALIZAR");
					}
				}
			});
		}
	});

	$('#btnClose').click(function() {
		$('#conteudo').load("./Views/Clientes/ProcurarClientes.php");	
	});
</script>
<style>
	.cabecalho {
		margin-bottom: 50px !important;
	}
</style>
