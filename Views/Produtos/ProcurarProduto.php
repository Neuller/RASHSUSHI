<?php
session_start();
if (isset($_SESSION['User'])) {
?>

<!DOCTYPE html>
<html>
	<body>
		<div class="tblProdutos container">
			<div class="cabecalho bgGradient">
				<div class="text-center textCabecalho_White opacidade">
					<h3><strong>PROCURAR PRODUTOS</strong></h3>
				</div>
			</div>
			<!-- TABELA DE PRODUTOS -->
			<div class="row">
				<div class="col-sm-12" align="center">
					<div id="tabelaProdutos"></div>
				</div>
			</div>
		</div>
	</body>	
</html>

<script type="text/javascript">
	$(document).ready(function($) {
		$('#tabelaProdutos').load('./Views/Produtos/TabelaProdutos.php');
	});

	// PREENCHER MODAL DE EDIÇÂO
	function adicionarDadosEditar(idProduto) {
		$('#conteudo').load('./Views/Produtos/ModalEditarProduto.php');
		$.ajax({
			type: "POST",
			data: "idProduto=" + idProduto,
			url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
			success: function(r) {
				dado = jQuery.parseJSON(r);
				$('#idProdutoU').val(dado['id_produto']);
				$('#descricaoU').val(dado['descricao']);
                const categoria = dado['id_categoria'];
				if ((categoria === "0") || (categoria === "") || (categoria === null)) {
					$('#categoriaSelectU').val("");
				} else {
					$('#categoriaSelectU').val(categoria);
				}
				$('#quantidadeU').val(dado['quantidade']);
				$('#valor_unidadeU').val(dado['valor_unidade']);
			}
		});
	}
	// PREENCHER MODAL DE VISUALIZAÇÃO
	function adicionarDadosVisualizar(idProduto) {
		$('#conteudo').load('./Views/Produtos/ModalVisualizarProduto.php');
		$.ajax({
			type: "POST",
			data: "idProduto=" + idProduto,
			url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
			success: function(r) {
				dado = jQuery.parseJSON(r);
				$('#idProdutoV').val(dado['id_produto']);
				$('#descricaoV').val(dado['descricao']);
                $.ajax({
					type: "POST",
					data: "idCategoria=" + dado.id_categoria,
					url: './Procedimentos/Utilitarios/ObterNomeCategoria.php',
				}).then(function(data) {
					var result = JSON.parse(data);
					var nomeCategoria = result;
					$('#categoriaV').val(nomeCategoria);
				});
				$('#quantidadeV').val(dado['quantidade']);
				$('#valor_unidadeV').val(dado['valor_unidade']);
			}
		});
	}
	// FUNÇÃO EXCLUIR
	function excluirCliente(idProduto) {
		alertify.confirm('ATENÇÃO', 'DESEJA EXCLUIR O REGISTRO?', function() {
			$.ajax({
				type: "POST",
				data: "idProduto=" + idProduto,
				url: "./Procedimentos/Produtos/ExcluirProduto.php",
				success: function(r) {
					if (r == 1) {
						$('#tabelaProdutos').load("./Views/Produtos/TabelaProdutos.php");
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