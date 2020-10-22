<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>

<!DOCTYPE html>
<html>
	<body>
		<div class="tblClientes container">
			<div class="cabecalho bgGradient">
				<div class="text-center textCabecalho_White opacidade">
					<h3><strong>PROCURAR CLIENTES</strong></h3>
				</div>
			</div>
			<!-- TABELA DE CLIENTES -->
			<div class="row">
				<div class="col-sm-12" align="center">
					<div id="tabelaClientes"></div>
				</div>
			</div>
		</div>
	</body>	
</html>

<script type="text/javascript">
	$(document).ready(function($) {
		$('#tabelaClientes').load('./Views/Clientes/TabelaClientes.php');
	});

		// PREENCHER MODAL DE EDIÇÂO
		function adicionarDadosEditar(idCliente) {
			$('#conteudo').load('./Views/Clientes/ModalEditarCliente.php');
			$.ajax({
				type: "POST",
				data: "idCliente=" + idCliente,
				url: "./Procedimentos/Clientes/ObterDadosCliente.php",
				success: function(r) {
					dado = jQuery.parseJSON(r);
					$('#idClienteU').val(dado['id_cliente']);
					$('#nomeU').val(dado['nome']);
					$('#cpfU').val(dado['cpf']);
					$('#cnpjU').val(dado['cnpj']);
					$('#cepU').val(dado['cep']);
					$('#bairroU').val(dado['bairro']);
					$('#ufU').val(dado['uf']);
					$('#enderecoU').val(dado['endereco']);
					$('#numeroU').val(dado['numero']);
					$('#complementoU').val(dado['complemento']);
					$('#telefoneU').val(dado['telefone']);
					$('#telefone2U').val(dado['telefone2']);
					$('#celularU').val(dado['celular']);
					$('#celular2U').val(dado['celular2']);
					$('#emailU').val(dado['email']);
				}
			});
		}
		// PREENCHER MODAL DE VISUALIZAÇÃO
		function adicionarDadosVisualizar(idCliente) {
			$('#conteudo').load('./Views/Clientes/ModalVisualizarCliente.php');
			$.ajax({
				type: "POST",
				data: "idCliente=" + idCliente,
				url: "./Procedimentos/Clientes/ObterDadosCliente.php",
				success: function(r) {
					dado = jQuery.parseJSON(r);
					$('#idClienteV').val(dado['id_cliente']);
					$('#nomeV').val(dado['nome']);
					$('#cpfV').val(dado['cpf']);
					$('#cnpjV').val(dado['cnpj']);
					$('#cepV').val(dado['cep']);
					$('#bairroV').val(dado['bairro']);
					$('#ufV').val(dado['uf']);
					$('#enderecoV').val(dado['endereco']);
					$('#numeroV').val(dado['numero']);
					$('#complementoV').val(dado['complemento']);
					$('#telefoneV').val(dado['telefone']);
					$('#telefone2V').val(dado['telefone2']);
					$('#celularV').val(dado['celular']);
					$('#celular2V').val(dado['celular2']);
					$('#emailV').val(dado['email']);
				}
			});
		}
		// FUNÇÃO EXCLUIR
		function excluirCliente(idCliente) {
			alertify.confirm('ATENÇÃO', 'DESEJA EXCLUIR O REGISTRO?', function() {
				$.ajax({
					type: "POST",
					data: "idCliente=" + idCliente,
					url: "./Procedimentos/Clientes/ExcluirClientes.php",
					success: function(r) {
						if (r == 1) {
							$('#tabelaClientes').load("./Views/Clientes/TabelaClientes.php");
							alertify.success("REGISTRO EXCLUÍDO");
						} else {
							alertify.error("NÃO FOI POSSÍVEL EXCLUIR");
						}
					}
				});
			}, function() {
				alertify.error('OPERAÇÃO CANCELADA')
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
	header("location:./index.php");
}
?>