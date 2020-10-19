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

		<!-- MODAL EDITAR PEDIDO -->
		<div id="modalEditarPedido"></div>
		<!-- MODAL VISUALIZAR PEDIDO -->
		<div id="modalVisualizarPedido"></div>

	</body>	
</html>

<script type="text/javascript">
	$(document).ready(function($) {
		$('#tabelaPedidos').load('./Views/Pedidos/TabelaPedidos.php');
		$('#modalEditarPedido').load('./Views/Pedidos/ModalEditarPedido.php');
		$('#modalVisualizarPedido').load('./Views/Pedidos/ModalVisualizarPedido.php');
	});

	// PREENCHER MODAL EDITAR
	function preencherModalEditar(idPedido) {
		$.ajax({
			type: "POST",
			data: "idPedido=" + idPedido,
			url: "./Procedimentos/Pedidos/ObterDadosPedido.php",
			success: function(r) {
				dado = jQuery.parseJSON(r);
			}
		});
	}
	// PREENCHER MODAL VISUALIZAR
	function preencherModalVisualizar(idPedido) {
		$.ajax({
			type: "POST",
			data: "idPedido=" + idPedido,
			url: "./Procedimentos/Pedidos/ObterDadosPedido.php",
			success: function(r) {
				dado = jQuery.parseJSON(r);
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