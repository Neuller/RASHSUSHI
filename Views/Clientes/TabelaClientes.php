<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Clientes.php";

$c = new conectar();
$conexao = $c->conexao();
$obj= new clientes();

$sql = "SELECT ID_Cliente, Nome, CPF, CNPJ, CEP, Bairro, Endereco, Numero, 
Complemento, Telefone, Celular, Email 
FROM clientes
ORDER BY ID_Cliente DESC";

$result=mysqli_query($conexao,$sql);
?>

<!DOCTYPE html>
<head>
  	
</head>
<body>
	<div class="table-responsive">
		<table id="tabelaClientesLoad" class="table table-hover table-condensed table-bordered text-center table-striped">
			<!-- CABEÇALHO -->
			<thead>
				<tr>
					<td>Nome</td>
					<td>CPF</td>
					<td>CNPJ</td>
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
						<td>'.$mostrar[1].'</td>
						<td>'.$mostrar[2].'</td>
						<td>'.$mostrar[3].'</td>
						<td>'.'<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#atualizarCliente" title="EDITAR" onclick="adicionarDado('.$mostrar[0].')">
						<span class="glyphicon glyphicon-pencil"></span>
						</span>'.'</td>
						<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarCliente" title="VISUALIZAR" onclick="adicionarDadosVisualizar('.$mostrar[0].')">
						<span class="glyphicon glyphicon-search"></span>
						</span>'.'</td>		
						<td>'.'<span class="btn btn-danger btn-sm" title="EXCLUIR" onclick="eliminarCliente('.$mostrar[0].')">
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
	$('#tabelaClientesLoad').DataTable(
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