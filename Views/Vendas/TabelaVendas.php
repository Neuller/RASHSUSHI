<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Vendas.php";

$c = new conectar();
$conexao = $c -> conexao();
$obj = new vendas();

$sql = "SELECT ID_Venda, ID_Cliente, ID_Produto, ID_Usuario, ValorTotal, DataVenda
FROM vendas 
GROUP BY ID_Venda
ORDER BY DataVenda DESC";

$result=mysqli_query($conexao,$sql);	
?>

<!DOCTYPE html>
	<head>
		
	</head>
	<body>
		<div class="table-responsive">
			<table id="tableVendas" class="table table-hover table-condensed table-bordered text-center table-striped">
				<!-- CABEÇALHO -->
				<thead>
					<tr>
						<td>Nome do Cliente</td>
						<td>Data da Venda</td>
						<td>Comprovante de Venda</td>
						<td>Visualizar</td>
					</tr>
				</thead> 
				<tbody>
					<?php
						while($mostrar=mysqli_fetch_array($result))
						{
							$data = date('d/m/Y', strtotime($mostrar[5]));
							echo 
							'
							<tr>
							<!-- NOME -->
								<td>'.$obj->nomeCliente($mostrar[1]).'</td>
							<!-- DATA DE CADASTRO -->
								<td>'.$data.'</td>	
							<!-- COMPROVANTE -->
							<td>'.'<a href="./Procedimentos/Vendas/CriarComprovante.php?idvenda='.$mostrar[0].'" target="_BLANK" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-print"></span>
							</a>'.'</td>			
							<!-- BOTÃO VISUALIZAR -->
								<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarVenda" onclick="visualizarDadosVendas('.$mostrar[0].','.$mostrar[1].')">
								<span class="glyphicon glyphicon-search"></span>
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
    $('#tableVendas').DataTable(
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