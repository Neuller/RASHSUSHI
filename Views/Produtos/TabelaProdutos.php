<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Produtos.php";
require_once "../../Classes/Utilitarios.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new produtos();
$objUtils = new utilitarios();

$sql = "SELECT id_produto, id_categoria, id_usuario, descricao, quantidade, valor_unidade
FROM produtos
ORDER BY id_produto DESC";

$result = mysqli_query($conexao,$sql);
?>

<!DOCTYPE html>
<head>
  	
</head>
<body>
	<div class="table-responsive">
		<table id="tabelaProdutosLoad" class="table table-hover table-condensed table-bordered text-center table-striped">
			<thead>
				<tr>
					<td>DESCRIÇÃO</td>
					<td>CATEGORIA</td>
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
						<td>'.$mostrar[3].'</td>
						<td>'.$objUtils->obterNomeCategoria($mostrar[1]).'</td>
						<td>'.'<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarProduto" title="EDITAR" onclick="adicionarDadosEditar('.$mostrar[0].')">
						<span class="glyphicon glyphicon-pencil"></span>
						</span>'.'</td>
						<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarProduto" title="VISUALIZAR" onclick="adicionarDadosVisualizar('.$mostrar[0].')">
						<span class="glyphicon glyphicon-search"></span>
						</span>'.'</td>		
						<td>'.'<span class="btn btn-danger btn-sm" title="EXCLUIR" onclick="excluirCliente('.$mostrar[0].')">
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
	$('#tabelaProdutosLoad').DataTable(
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