<?php 
class entregadores{
public function cadastrarEntregador($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT into entregadores (id_veiculo, id_usuario, nome, cpf, cnpj, cep, bairro, uf, endereco, numero, complemento, telefone, telefone2, celular, celular2, email) 
	VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]', 
	'$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', '$dados[9]', '$dados[10]', '$dados[11]', '$dados[12]', '$dados[13]', '$dados[14]', '$dados[15]')";
	
	return mysqli_query($conexao, $sql);
}
}
?>