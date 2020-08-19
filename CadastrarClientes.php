<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>

	<!DOCTYPE html>
	<html>
	<!-- MENU -->

	<head>
		<?php require_once "./Menu.php"; ?>
	</head>

	<body>
		<div class="container">
			<!-- CABEÇALHO -->
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>CADASTRAR CLIENTES</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmClientes">
						<div>
							<!-- FORMULÁRIO DADOS PESSOAIS -->
							<div class='col-md-12 col-sm-12 col-xs-12'>
								<div class="text-left">
									<h4><strong>DADOS PESSOAIS</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- NOME -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
									<label>NOME COMPLETO<span class="required">*</span></label>
									<input type="text" class="form-control input-sm text-uppercase" id="nome" name="nome" maxlenght="50">
								</div>
							</div>
							<!-- CPF -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>CPF</label>
									<input type="text" class="form-control input-sm align cpf text-uppercase" placeholder="###.###.###-##" id="cpf" name="cpf">
								</div>
							</div>
							<!-- CNPJ -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>CNPJ</label>
									<input type="text" class="form-control input-sm align cnpj text-uppercase" placeholder="##.###.###/###-##" id="cnpj" name="cnpj">
								</div>
							</div>
							<!-- E-MAIL -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
									<label>E-MAIL</label>
									<input type="text" class="form-control input-sm align text-uppercase" placeholder="exemplo@exemplo.com" id="email" name="email">
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
									<input type="text" class="form-control input-sm align cep text-uppercase" placeholder="#####-###" id="cep" name="cep">
								</div>
							</div>
							<!-- BAIRRO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>BAIRRO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="bairro" name="bairro">
								</div>
							</div>
							<!-- ENDEREÇO -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
									<label>ENDEREÇO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="endereco" name="endereco">
								</div>
							</div>
							<!-- NÚMERO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>NÚMERO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="numero" name="numero">
								</div>
							</div>
							<!-- COMPLEMENTO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>COMPLEMENTO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="complemento" name="complemento">
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
									<input type="text" class="form-control input-sm align telefone text-uppercase" placeholder="(##) ####-####" id="telefone" name="telefone">
								</div>
							</div>
							<!-- CELULAR -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>CELULAR<span class="required">*</span></label>
									<input type="text" class="form-control input-sm align celular text-uppercase" placeholder="(##) 9 ####-####" id="celular" name="celular">
								</div>
							</div>
							<!-- BOTÂO CADASTRAR -->
							<div class="btnCadastrar">
								<span class="btn btn-primary" id="btnAdicionar" title="CADASTRAR">CADASTRAR</span>
							</div>
					</form>
				</div>
			</div>
		</div>
	</body>

	</html>

	<!-- SCRIPT -->
	<script type="text/javascript">
		// CADASTRAR
		$(document).ready(function() {
			$('.celular').mask('(99) 9 9999-9999');
			$('.telefone').mask('(99) 9999-9999');
			$('.cpf').mask('999.999.999-99');
			$('.cnpj').mask('99.999.999/9999-99');
			$('.cep').mask('99999-999');

			$('#btnAdicionar').click(function() {
				// VALIDAR CAMPOS
				var nome = frmClientes.nome.value;
				var cpf = frmClientes.cpf.value;
				var cnpj = frmClientes.cnpj.value;
				var celular = frmClientes.celular.value;

				if ((nome == "") || (celular == "")) {
					alertify.alert("ATENÇÃO", "PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS.");
					return false;
				}
				if ((cpf == "") && (cnpj == "")) {
					alertify.alert("ATENÇÃO", "INSIRA UM CPF OU CNPJ VÁLIDO.");
					return false;
				}

				dados = $('#frmClientes').serialize();

				$.ajax({
					type: "POST",
					data: dados,
					url: "./Procedimentos/Clientes/AdicionarClientes.php",
					success: function(r) {
						if (r == 1) {
							$('#frmClientes')[0].reset();
							alertify.success("CADASTRO REALIZADO");
						} else {
							alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
						}
					}
				});
			});
		});
	</script>

	<style>
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