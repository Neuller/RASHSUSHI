<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Clientes.php";

$c = new conectar();
$conexao = $c->conexao();
$obj= new clientes();

$sql = "SELECT id_cliente, nome, cpf, cnpj, cep, bairro, uf, endereco, 
numero, complemento, telefone, telefone2, celular, celular2, email 
FROM clientes
ORDER BY id_cliente DESC";

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
					<td>NOME</td>
					<td>CPF</td>
					<td>CNPJ</td>
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
						<td>'.$mostrar[1].'</td>
						<td>'.$mostrar[2].'</td>
						<td>'.$mostrar[3].'</td>
						<td>'.'<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarCliente" title="EDITAR" onclick="adicionarDadosEditar('.$mostrar[0].')">
						<span class="glyphicon glyphicon-pencil"></span>
						</span>'.'</td>
						<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarCliente" title="VISUALIZAR" onclick="adicionarDadosVisualizar('.$mostrar[0].')">
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
	$('#tabelaClientesLoad').DataTable(
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