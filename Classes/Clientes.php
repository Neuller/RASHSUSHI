<?php 
class clientes{
public function cadastrarCliente($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT into clientes (id_usuario, nome, cpf, cnpj, cep, bairro, uf, endereco, numero, complemento, telefone, telefone2, celular, celular2, email) 
	VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]', 
	'$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', '$dados[9]', '$dados[10]', '$dados[11]', '$dados[12]', '$dados[13]', '$dados[14]')";
	
	return mysqli_query($conexao, $sql);
}
public function obterDadosCliente($idCliente){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT id_usuario, nome, cpf, cnpj, cep, bairro, uf, endereco, numero, complemento, telefone, telefone2, celular, celular2, email 
	FROM clientes 
	WHERE id_cliente = '$idCliente' ";

	$result = mysqli_query($conexao, $sql);
	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'id_cliente' => $mostrar[0],
		'nome' => $mostrar[1],
		'cpf' => $mostrar[2],
		'cnpj' => $mostrar[3],
		'cep' => $mostrar[4],
		'bairro' => $mostrar[5],
		'uf' => $mostrar[6],
		'endereco' => $mostrar[7],
		'numero' => $mostrar[8],
		'complemento' => $mostrar[9],
		'telefone' => $mostrar[10],
		'telefone2' => $mostrar[11],
		'celular' => $mostrar[12],
		'celular2' => $mostrar[13],
		'email' => $mostrar[14]
	);
	return $dados;
}
public function atualizarCliente($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE clientes 
	SET nome = '$dados[1]', 
	cpf = '$dados[2]', 
	cnpj = '$dados[3]',
	cep = '$dados[4]',
	bairro = '$dados[5]',
	uf = '$dados[6]', 
	endereco = '$dados[7]',
	numero = '$dados[8]',
	complemento = '$dados[9]', 
	telefone = '$dados[10]', 
	telefone2 = '$dados[11]',
	celular = '$dados[12]',
	celular2 = '$dados[13]',
	email = '$dados[14]',
	WHERE id_cliente = '$dados[0]' ";

	echo mysqli_query($conexao, $sql);
}
public function excluirCliente($idcliente){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "DELETE from clientes WHERE id_cliente = '$idcliente' ";

	return mysqli_query($conexao, $sql);
}
}
?>