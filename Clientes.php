<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>

	<!DOCTYPE html>
	<html>
	<!-- MENU -->

	<head>
		<?php require_once "./Classes/Conexao.php"; ?>
		<?php require_once "./Menu.php"; ?>
	</head>

	<body>
		<div class="tblClientes container">
			<!-- CABEÇALHO -->
			<div class="cabecalho bgGray">
				<div class="text-center textCabecalho opacidade">
					<h3><strong>TABELA DE CLIENTES</strong></h3>
				</div>
			</div>
			<!-- TABELA DE CLIENTES -->
			<div class="row">
				<div class="col-sm-12" align="center">
					<div id="tabelaClientes"></div>
				</div>
			</div>
			<!-- BTN NOVO CADASTRO -->
			<div class="btnLeft">
				<span class="btn btn-success" id="btnNovoCadastro">NOVO CADASTRO</span>
			</div>
		</div>
		<!-- MODAL EDITAR -->
		<div class="modal fade" id="atualizarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditar">
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
										<label>CEP<span class="required">*</span></label>
										<input type="text" class="form-control input-sm align cep text-uppercase" placeholder="#####-###" id="cepU" name="cepU">
									</div>
								</div>
								<!-- BAIRRO -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>BAIRRO<span class="required">*</span></label>
										<input type="text" class="form-control input-sm align text-uppercase" id="bairroU" name="bairroU">
									</div>
								</div>
								<!-- ENDEREÇO -->
								<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
									<div>
										<label>ENDEREÇO<span class="required">*</span></label>
										<input type="text" class="form-control input-sm align text-uppercase" id="enderecoU" name="enderecoU">
									</div>
								</div>
								<!-- NÚMERO -->
								<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
									<div>
										<label>NÚMERO<span class="required">*</span></label>
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
										<input type="text" class="form-control input-sm align celular text-uppercase" placeholder="(##) 9 ####-####" id="celularU" name="celularU">
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
		<div class="modal fade" id="visualizarCliente" tabindex="-1" role="dialog" aria-labelledby="modalVisualizar">
			<div class="modal-dialog modal-lg" role="document" data-keyboard="true">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="modal-content col-md-12 col-sm-12 col-xs-12">
						<!-- TÍTULO -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">VISUALIZAR</h4>
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

	</html>
	<!-- SCRIPT -->
	<script type="text/javascript">
		// CARREGAR TABELA
		$(document).ready(function() {
			$('#tabelaClientes').load('./Views/Clientes/TabelaClientes.php');
			$('.celular').mask('(99) 9 9999-9999');
			$('.telefone').mask('(99) 9999-9999');
			$('.cpf').mask('999.999.999-99');
			$('.cnpj').mask('99.999.999/9999-99');
			$('.cep').mask('99999-999');

			$('#btnNovoCadastro').click(function() {
				window.location.href = "http://localhost/NservPortal/CadastrarClientes.php";
			});
		});
		// PREENCHER MODAL DE EDIÇÂO
		function adicionarDado(idcliente) {
			$.ajax({
				type: "POST",
				data: "idcliente=" + idcliente,
				url: "./Procedimentos/Clientes/ObterDadosCliente.php",
				success: function(r) {
					dado = jQuery.parseJSON(r);
					$('#idclienteU').val(dado['ID_Cliente']);
					$('#nomeU').val(dado['Nome']);
					$('#cpfU').val(dado['CPF']);
					$('#cnpjU').val(dado['CNPJ']);
					$('#cepU').val(dado['CEP']);
					$('#bairroU').val(dado['Bairro']);
					$('#enderecoU').val(dado['Endereco']);
					$('#numeroU').val(dado['Numero']);
					$('#complementoU').val(dado['Complemento']);
					$('#telefoneU').val(dado['Telefone']);
					$('#celularU').val(dado['Celular']);
					$('#emailU').val(dado['Email']);
				}
			});
		}
		// PREENCHER MODAL DE VISUALIZAÇÃO
		function adicionarDadosVisualizar(idcliente) {
			$.ajax({
				type: "POST",
				data: "idcliente=" + idcliente,
				url: "./Procedimentos/Clientes/ObterDadosCliente.php",
				success: function(r) {
					dado = jQuery.parseJSON(r);
					$('#idclienteView').val(dado['ID_Cliente']);
					$('#nomeView').val(dado['Nome']);
					$('#cpfView').val(dado['CPF']);
					$('#cnpjView').val(dado['CNPJ']);
					$('#cepView').val(dado['CEP']);
					$('#bairroView').val(dado['Bairro']);
					$('#enderecoView').val(dado['Endereco']);
					$('#numeroView').val(dado['Numero']);
					$('#complementoView').val(dado['Complemento']);
					$('#telefoneView').val(dado['Telefone']);
					$('#celularView').val(dado['Celular']);
					$('#emailView').val(dado['Email']);
				}
			});
		}
		// EXCLUIR 
		function eliminarCliente(idcliente) {
			alertify.confirm('ATENÇÃO', 'Realmente deseja excluir?', function() {
				$.ajax({
					type: "POST",
					data: "idcliente=" + idcliente,
					url: "./Procedimentos/Clientes/DeletarClientes.php",
					success: function(r) {
						if (r == 1) {
							$('#tabelaClientes').load("./Views/Clientes/TabelaClientes.php");
							alertify.success("Registro excluído com sucesso");
						} else {
							alertify.error("Não foi possível excluir");
						}
					}
				});
			}, function() {
				alertify.error('Cancelado')
			});
		}
		// EDITAR 
		$(document).ready(function() {
			$('#btnEditar').click(function() {
				dados = $('#frmClientesU').serialize();
				$.ajax({
					type: "POST",
					data: dados,
					url: "./Procedimentos/Clientes/AtualizarClientes.php",
					success: function(r) {
						if (r == 1) {
							$('#tabelaClientes').load("./Views/Clientes/TabelaClientes.php");
							alertify.success("Registro atualizado com sucesso");
						} else {
							alertify.error("Não foi possível atualizar");
						}
					}
				});
			})
		})
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