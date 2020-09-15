<?php 
class servicos{
// MÉTODO ADICIONAR
public function adicionarServico($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$data=date('Y-m-d');

	$sql = "INSERT INTO servicos (ID_Cliente, ID, ID_Status, Equipamento, Info, SerialNumber, DataCadastro) 
	VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]', '$dados[5]', '$data')";

	return mysqli_query($conexao, $sql);
}
// MÉTODO RETORNAR DADOS 
public function obterDadosServicos($idServico){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT ID_Servico, ID_Cliente, ID, ID_Status, numero_ordem_servico, 
	Equipamento, Info, Servico, idTecnico, SerialNumber, Garantia, Preco, 
	valor_terceirizado, DataCadastro, DataSaida, Diagnostico, NF_Emitida
	FROM servicos WHERE ID_Servico = '$idServico' ";

	$result = mysqli_query($conexao, $sql);
	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'ID_Servico' => $mostrar[0],
		'ID_Cliente' => $mostrar[1],
		'ID' => $mostrar[2],
		'ID_Status' => $mostrar[3],
		'ordemServico' => $mostrar[4],
		'Equipamento' => $mostrar[5],
		'Info' => $mostrar[6],
		'Servico' => $mostrar[7],
		'idTecnico' => $mostrar[8],
		'SerialNumber' => $mostrar[9],
		'Garantia' => $mostrar[10],
		'Preco' => $mostrar[11],
		'valorTerceiro' => $mostrar[12],
		'DataCadastro' => $mostrar[13],
		'DataSaida' => $mostrar[14],
		'Diagnostico' => $mostrar[15],
		'NF_Emitida' => $mostrar[16]
	);

	return $dados;
}
// MÉTODO EDITAR
public function editarServico($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE servicos SET ID_Status = '$dados[1]', Servico = '$dados[2]', 
	Info = '$dados[5]', idTecnico = '$dados[3]', numero_ordem_servico = '$dados[4]', Garantia = '$dados[6]', 
	valor_terceirizado = '$dados[7]', Preco = '$dados[8]', DataSaida = '$dados[9]', Diagnostico = '$dados[10]', NF_Emitida = '$dados[11]'
	WHERE ID_Servico = '$dados[0]'";

	echo mysqli_query($conexao, $sql);
}
// MÉTODOS INFORMAÇÕES DO CLIENTE PELO ID
public function nomeCliente($idCliente){
	$c= new conectar();
	$conexao=$c->conexao();

	$sql="SELECT Nome 
	FROM clientes WHERE ID_Cliente='$idCliente'";

	$result=mysqli_query($conexao,$sql);
	$ver=mysqli_fetch_row($result);

	return $ver[0];
}
// MÉTODO GERAR NOME DE STATUS PELO ID
public function nomeStatus($idstatus){
	$c= new conectar();
	$conexao=$c->conexao();

	$sql="SELECT Nome_Status 
	FROM status WHERE ID_Status='$idstatus'";

	$result=mysqli_query($conexao,$sql);

	$ver=mysqli_fetch_row($result);

	return $ver[0];
}
// MÉTODO GERAR NOME DE TÉCNICOS PELO ID
public function nomeTecnico($idTecnico){
	$c= new conectar();
	$conexao=$c->conexao();

	$sql="SELECT nome 
	FROM tecnicos WHERE idTecnico='$idTecnico'";

	$result=mysqli_query($conexao,$sql);

	$ver=mysqli_fetch_row($result);

	return $ver[0];
}
}
?>