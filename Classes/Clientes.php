<?php 
class clientes{
// MÉTODO ADICIONAR
public function adicionarCliente($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT into clientes (ID_Usuario, Nome, CPF, CNPJ, CEP, Bairro, Endereco, Numero, Complemento, Telefone, Celular, Email) 
	VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]', 
	'$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', '$dados[9]', '$dados[10]', '$dados[11]')";
	
	return mysqli_query($conexao, $sql);
}
// MÉTODO RETORNAR DADOS 
public function obterDadosCliente($idcliente){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT ID_Cliente, Nome, CPF, CNPJ, CEP, Bairro, Endereco, Numero, Complemento, Telefone, Celular, Email 
	FROM clientes 
	WHERE ID_Cliente = '$idcliente' ";

	$result = mysqli_query($conexao, $sql);
	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'ID_Cliente' => $mostrar[0],
		'Nome' => $mostrar[1],
		'CPF' => $mostrar[2],
		'CNPJ' => $mostrar[3],
		'CEP' => $mostrar[4],
		'Bairro' => $mostrar[5],
		'Endereco' => $mostrar[6],
		'Numero' => $mostrar[7],
		'Complemento' => $mostrar[8],
		'Telefone' => $mostrar[9],
		'Celular' => $mostrar[10],
		'Email' => $mostrar[11]
	);
	return $dados;
}
// MÉTODO EDITAR 
public function editarCliente($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE clientes 
	SET Nome = '$dados[1]', 
	CPF = '$dados[2]', 
	CNPJ = '$dados[3]',
	CEP = '$dados[4]',
	Bairro = '$dados[5]',
	Endereco = '$dados[6]', 
	Numero = '$dados[7]',
	Complemento = '$dados[8]',
	Telefone = '$dados[9]', 
	Celular = '$dados[10]', 
	Email = '$dados[11]' 
	WHERE ID_Cliente = '$dados[0]' ";

	echo mysqli_query($conexao, $sql);
}
// MÉTODO EXCLUIR 
public function excluirCliente($idcliente){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "DELETE from clientes WHERE ID_Cliente = '$idcliente' ";

	return mysqli_query($conexao, $sql);
}
}
?>