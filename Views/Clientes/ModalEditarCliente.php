<div class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditar">

	<div class="modal-dialog modal-lg" role="document" data-keyboard="true">

		<div class="col-md-12 col-sm-12 col-xs-12">

			<div class="modal-content teste col-md-12 col-sm-12 col-xs-12">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="CLOSE"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">EDITAR</h4>
				</div>
				<!-- FORMULÁRIO -->
				<div class="modal-body">
					<form id="frmClientesU">
						<!-- FORMULÁRIO DADOS PESSOAIS -->
						<div class='col-md-12 col-sm-12 col-xs-12'>
							<div class="text-left">
								<h4><strong>DADOS PESSOAIS</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
							</div>
							<hr>
						</div>
						<!-- ID -->
						<div>
							<input type="text" hidden="" id="idclienteU" name="idclienteU">
						</div>
						<!-- NOME -->
						<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
							<div>
								<label>NOME COMPLETO<span class="required">*</span></label>
									<input type="text" class="form-control input-sm align text-uppercase" id="nomeU" name="nomeU" maxlenght="50">
							</div>
						</div>
						<!-- CPF -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>CPF</label>
								<input type="text" class="form-control input-sm align cpf text-uppercase" id="cpfU" name="cpfU">
							</div>
						</div>
						<!-- CNPJ -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>CNPJ</label>
								<input type="text" class="form-control input-sm align cnpj text-uppercase" id="cnpjU" name="cnpjU">
							</div>
						</div>
						<!-- E-MAIL -->
						<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
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
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>CEP</label>
								<input type="text" class="form-control input-sm align cep text-uppercase" placeholder="#####-###" id="cepU" name="cepU">
							</div>
						</div>
						<!-- BAIRRO -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>BAIRRO</label>
								<input type="text" class="form-control input-sm align text-uppercase" id="bairroU" name="bairroU">
							</div>
						</div>
						<!-- ENDEREÇO -->
						<div class="mb-20px col-md-8 col-sm-8 col-xs-8 itensFormularioCadastro">
							<div>
								<label>ENDEREÇO</label>
								<input type="text" class="form-control input-sm align text-uppercase" id="enderecoU" name="enderecoU">
							</div>
						</div>
						<!-- UF -->
						<div class="mb-20px col-md-4 col-sm-4 col-xs-4 itensFormularioCadastro">
							<div>
								<label>UF</label>
								<input type="text" class="form-control input-sm align text-uppercase" id="ufU" name="ufU">
							</div>
						</div>
						<!-- NÚMERO -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>NÚMERO</label>
								<input type="text" class="form-control input-sm align text-uppercase" id="numeroU" name="numeroU">
							</div>
						</div>
						<!-- COMPLEMENTO -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
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
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>TELEFONE</label>
								<input type="text" class="form-control input-sm align telefone text-uppercase" placeholder="(##) ####-####" id="telefoneU" name="telefoneU">
							</div>
						</div>
						<!-- CELULAR -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>CELULAR<span class="required">*</span></label>
								<input type="text" class="form-control input-sm align celular text-uppercase" placeholder="(##) # ####-####" id="celularU" name="celularU">
							</div>
						</div>
						<!-- TELEFONE 2 -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
							<div>
								<label>TELEFONE</label>
								<input type="text" class="form-control input-sm align telefone text-uppercase" placeholder="(##) ####-####" id="telefone2U" name="telefone2U">
							</div>
						</div>
						<!-- CELULAR 2 -->
						<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
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

<script type="text/javascript">
	$(document).ready(function($) {
		$('.cpf').mask('999.999.999-99');
		$('.cnpj').mask('99.999.999/9999-99');
		$('.cep').mask('99999-999');
		$('.telefone').mask('(99) 9999-9999');
		$('.celular').mask('(99) 9 9999-9999');

		$(".cep").change(function(){
			var cep = frmClientesU.cepU.value;
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
		var nome = frmClientesU.nomeU.value;
		var cpf = frmClientesU.cpf.value;
		var cnpj = frmClientesU.cnpj.value;
		var celular = frmClientesU.celularU.value;

		if ((nome == "") || (celular == "")) {
			alertify.alert("ATENÇÃO", "PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS.");
			return false;
		}

		$.ajax({ 
			type: 'POST',
			data:{"CPF" : cpf, "CNPJ" : cnpj},
			url: './Procedimentos/Verificacoes/Verificar_CPF_CNPJ.php', 
			success: function(r) { 
				data = $.parseJSON(r);
				if (data == 0) {
					dados = $('#frmClientesU').serialize();
						$.ajax({
						type: "POST",
						data: dados,
						url: "./Procedimentos/Clientes/AtualizarCliente.php",
						success: function(r) {
							if (r == 1) {
								$('#tabelaClientes').load("./Views/Clientes/TabelaClientes.php");
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
	});
</script>
