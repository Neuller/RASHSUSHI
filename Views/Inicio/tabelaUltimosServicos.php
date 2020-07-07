<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";

$c = new conectar();
$conexao = $c->conexao();
$obj = new servicos();

// DATA DE HOJE
$dataAtual = date('m');

$sql = "SELECT ID_Servico, ID_Cliente, ID_Status, Equipamento, Info, SerialNumber, Preco, DataCadastro, DataSaida 
FROM servicos 
where MONTH(DataCadastro) = ".$dataAtual."
ORDER BY DataCadastro DESC";

$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>

<head>

</head>

<body>
    <div class="table-responsive">
        <table id="tabelaUltimosServicos" class="table table-hover table-condensed table-bordered text-center table-striped">
            <!-- CABEÇALHO -->
			<thead>
				<tr>
					<td>Nome do Cliente</td>
					<td>Status</td>
					<td>N° de Série</td>
					<td>Data de entrada</td>
					<td>Ordem de Serviço</td>
					<td>Editar</td>
					<td>Visualizar</td>
				</tr>
			</thead> 
			<tbody>
				<?php
					while($mostrar=mysqli_fetch_array($result))
					{
						$data = date('d/m/Y', strtotime($mostrar[7]));
						echo 
						'
						<tr>
						<!-- NOME -->
							<td>'.$obj->nomeCliente($mostrar[1]).'</td>
						<!-- STATUS	-->
							<td>'.$obj->nomeStatus($mostrar[2]).'</td>
						<!-- NÚMERO DE SERIAL -->
							<td>'.$mostrar[5].'</td>
						<!-- DATA DE CADASTRO -->
							<td>'.$data.'</td>
						<!-- ORDEM DE SERVIÇO -->
							<td>'.'<a href="./Procedimentos/Servicos/CriarOrdemServico.php?idserv='.$mostrar[0].'" target="_BLANK" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-print"></span>
							</a>'.'</td>
						<!-- BOTÂO EDITAR -->
							<td>'.'<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#atualizarServico" title="Editar" onclick="adicionarDados('.$mostrar[0].','.$mostrar[1].')">
							<span class="glyphicon glyphicon-pencil"></span>
							</span>'.'</td>
						<!-- BOTÃO VISUALIZAR -->
							<td>'.'<span class="btn btn-default btn-sm" data-toggle="modal" data-target="#visualizarServico" onclick="visualizarDados('.$mostrar[0].','.$mostrar[1].')">
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

</script>