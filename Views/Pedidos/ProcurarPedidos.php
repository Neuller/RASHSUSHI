<?php
session_start();
if (isset($_SESSION['User'])) {
?>

<!DOCTYPE html>
<html>
	<body>
		<div class="tblPedidos container">
			<div class="cabecalho bgGradient">
				<div class="text-center textCabecalho_White opacidade">
					<h3><strong>PROCURAR PEDIDOS</strong></h3>
				</div>
			</div>
			<!-- TABELA DE PEDIDOS -->
			<div class="row">
				<div class="col-sm-12" align="center">
					<div id="tabelaPedidos"></div>
				</div>
			</div>
		</div>
	</body>	
</html>

<script type="text/javascript">
	$(document).ready(function($) {
		$('#tabelaPedidos').load('./Views/Pedidos/TabelaPedidos.php');
	});

	// PREENCHER MODAL VISUALIZAR
	function preencherModalVisualizar(idPedido) {
		$('#conteudo').load('./Views/Pedidos/ModalVisualizarPedido.php');
		$.ajax({
			type: "POST",
			data: "idPedido=" + idPedido,
			url: "./Procedimentos/Pedidos/ObterDadosPedido.php",
			success: function(r) {
				dado = jQuery.parseJSON(r);
				$('#idPedidoV').val(dado['id_pedido']);
				$.ajax({
					type: "POST",
					data: "idCliente=" + dado.id_cliente,
					url: './Procedimentos/Clientes/ObterDadosCliente.php',
				}).then(function(data) {
					var result = JSON.parse(data);
					$('#nomeV').val(result.nome);
					$('#cpfV').val(result.cpf);
					$('#cnpjV').val(result.cnpj);
					$('#telefoneV').val(result.telefone);
					$('#celularV').val(result.celular);
				});
				$('#descricaoV').val(dado['descricao']);
				$('#quantidadeV').val(dado['quantidade']);
				$('#valor_unidadeV').val(dado['valor_unidade']);
				$('#statusV').val(dado['status']);
				$('#data_horaV').val(dado['data_hora_pedido']);
				$('#valor_totalV').val(dado['valor_total']);
			}
		});
	}
	// EXCLUIR
	function excluir(idPedido) {
		alertify.confirm('ATENÇÃO', 'DESEJA EXCLUIR O REGISTRO?', function() {
			$.ajax({
				type: "POST",
				data: "idPedido=" + idPedido,
				url: "./Procedimentos/Pedidos/ExcluirPedido.php",
				success: function(r) {
					if (r == 1) {
						$('#tabelaPedidos').load("./Views/Pedidos/TabelaPedidos.php");
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
	// VERSÃO COMPLETA
	function versaoCompleta() {
		alertify.alert('ATENÇÃO', 'FUNCIONALIDADE DISPONÍVEL APENAS NA VERSÃO COMPLETA');
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