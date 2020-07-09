<?php
class utilitarios{
// CONVERTE DATA
public function data($data) {
	return date("d/m/Y", strtotime($data));
}
// RETORNA NOME DO COLABORADOR
public function nomeColaborador($ID) {
	$c = new conectar();
	$conexao = $c-> conexao();
	
	$sql="SELECT nome 
	FROM usuarios 
	WHERE ID = '$ID'";
	
	$resultado = mysqli_query($conexao, $sql);
	$mostrar = mysqli_fetch_row($resultado);
	
	return $mostrar[0];
}
}
?>