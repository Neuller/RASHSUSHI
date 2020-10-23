<?php 
class produtos{
public function cadastrarProduto($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT INTO produtos (id_categoria, id_usuario, descricao, quantidade, valor_unidade) 
	VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]')";

	return mysqli_query($conexao, $sql);
}
public function obterDadosProdutos($idProduto){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT id_produto, id_categoria, id_usuario, descricao, quantidade, valor_unidade
	FROM produtos WHERE id_produto = '$idProduto' ";

	$result = mysqli_query($conexao, $sql);
	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'id_produto' => $mostrar[0],
		'id_categoria' => $mostrar[1],
		'id_usuario' => $mostrar[2],
		'descricao' => $mostrar[3],
		'quantidade' => $mostrar[4],
		'valor_unidade' => $mostrar[5]
	);
	return $dados;
}

public function editarProduto($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE produtos SET id_categoria = '$dados[1]', descricao = '$dados[2]', quantidade = '$dados[3]',
	valor_unidade = '$dados[4]'
    WHERE id_produto = '$dados[0]'";

	echo mysqli_query($conexao, $sql);
}

public function excluirProduto($idProduto){
	$c = new conectar();
	$conexao = $c -> conexao();

	$sql = "DELETE from produtos WHERE id_produto = '$idProduto' ";

	return mysqli_query($conexao, $sql);
}
}
?>