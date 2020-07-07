<?php 
require_once "../../../Classes/Conexao.php";
require_once "../../../Classes/Produtos.php";

$c = new conectar();
$conexao = $c->conexao();
$obj= new produtos();

$sql = "SELECT ID_Produto, ID_Categoria, Codigo, Descricao, Preco, PrecoInstalacao, Estoque, NF
FROM produtosnserv
WHERE ID_Categoria = 6
ORDER BY ID_Produto DESC";

$result=mysqli_query($conexao,$sql);
?>

<!DOCTYPE html>
<head>
  	
</head>
<body>
	<div class="table-responsive">
		<table id="tabelaGabineteLoad" class="table table-hover table-condensed table-bordered text-center table-striped">
			<!-- CABEÇALHO -->
			<thead>
				<tr>
					<td>Código</td>
					<td>Descrição</td>
					<td>Editar</td>
					<td>Visualizar</td>
					<td>Excluir</td>
				</tr>
			</thead>
			<tbody>
				<?php
					while($mostrar=mysqli_fetch_array($result))
					{
						echo 
						'
						<tr>
						<td>'.$mostrar[2].'</td>
						<td>'.$mostrar[3].'</td>
						<!-- BOTÂO EDITAR -->
						<td>'.'<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarProduto" title="Editar" onclick="adicionarDados('.$mostrar[0].','.$mostrar[1].')">
						<span class="glyphicon glyphicon-pencil"></span>
						</span>'.'</td>
						<!-- BOTÃO VISUALIZAR -->
						<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarProduto" onclick="visualizarDados('.$mostrar[0].','.$mostrar[1].')">
						<span class="glyphicon glyphicon-search"></span>
						</span>'.'</td>
						<!-- BOTÃO EXCLUIR -->
						<td>'.'<span class="btn btn-danger btn-sm" onclick="excluirProduto('.$mostrar[0].')">
						<span class="glyphicon glyphicon-remove"></span>
						</span>'.'</td>
						</tr>
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
	$('#tabelaGabineteLoad').DataTable(
		{	
			"language": {
			"lengthMenu": "_MENU_ registros por página",
			"zeroRecords": "Nada enconstrado, desculpe",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "Nenhum registro foi encontrado",
			"infoFiltered": "(Filtrado de _MAX_ registros no total)",
			"search": "Pesquisar:",
			"paginate":{
				"first":      "Primeiro",
				"last":       "Ultimo",
				"next":       "Próximo",
				"previous":   "Anterior"
			}
			}
		}
	);
});
</script>