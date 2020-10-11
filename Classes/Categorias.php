<?php 
class categorias{
	public function cadastrarCategoria($dados){
		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "INSERT into produtos_categoria (id_usuario, descricao) 
		VALUES ('$dados[0]','$dados[1]')";
		
		return mysqli_query($conexao, $sql);
	}
}
?>