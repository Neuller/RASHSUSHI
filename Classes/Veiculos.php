<?php 
class veiculos{
public function cadastrarVeiculo($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT into veiculos (id_usuario, marca_modelo, placa, chassi, renavam, cor, especie) 
	VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]')";
	
	return mysqli_query($conexao, $sql);
}
}
?>