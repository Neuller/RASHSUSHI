<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Pedidos.php";
require_once "../../Classes/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new pedidos();
$objUtils = new utilitarios();

$sql = "SELECT id_pedido, id_cliente, id_produto, id_usuario, valor_total, status, data_hora_pedido
FROM pedidos
GROUP BY id_pedido
ORDER BY id_pedido DESC";

$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<body>
	<div class="table-responsive">
		<table id="tabelaPedidosLoad" class="table table-hover table-condensed table-bordered text-center table-striped">
			<thead>
				<tr>
					<td>NÚMERO DO PEDIDO</td>
					<td>CLIENTE</td>
					<td>IMPRIMIR</td>
					<td>EDITAR</td>
					<td>VISUALIZAR</td>
					<td>EXCLUIR</td>
				</tr>
			</thead>
			<tbody>
				<?php
					while($mostrar=mysqli_fetch_array($result))
					{
						echo 
						'
						<tr>
						<td>'.$mostrar[0].'</td>
						<td>'.$objUtils->obterNomeCliente($mostrar[1]).'</td>
						<td>'.'<a href="./Procedimentos/Pedidos/CriarComprovante.php?idPedido='.$mostrar[0].'" target="_BLANK" class="btn btn-danger btn-sm" title="IMPRIMIR">
						<span class="glyphicon glyphicon-print"></span>
						</a>'.'</td>
						<td>'.'<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarPedido" title="EDITAR" onclick="preencherModalEditar('.$mostrar[0].')">
						<span class="glyphicon glyphicon-pencil"></span>
						</span>'.'</td>
						<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarPedido" title="VISUALIZAR" onclick="preencherModalVisualizar('.$mostrar[0].')">
						<span class="glyphicon glyphicon-search"></span>
						</span>'.'</td>		
						<td>'.'<span class="btn btn-danger btn-sm" title="EXCLUIR" onclick="excluir('.$mostrar[0].')">
						<span class="glyphicon glyphicon-remove"></span>
						</span>'.'</td>
						</tr>
						';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
		
<script>
$(document).ready(function(){
	$('#tabelaPedidosLoad').DataTable(
		{	
			"language": {
			"lengthMenu": "_MENU_ REGISTROS POR PÁGINA",
			"zeroRecords": "NENHUM REGISTRO ENCONTRADO",
			"info": "PÁGINA _PAGE_ DE _PAGES_",
			"infoEmpty": "Nenhum registro foi encontrado",
			"infoFiltered": "(FILTRADO DE _MAX_ REGISTROS NO TOTAL)",
			"search": "PESQUISAR:",
			"paginate":{
				"first":      "PRIMEIRO",
				"last":       "ÚLTIMO",
				"next":       "PRÓXIMO",
				"previous":   "ANTERIOR"
			}
			}
		}
	);
});
</script>