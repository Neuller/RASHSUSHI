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
// MÉTODO EDITAR
public function editarProduto($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "UPDATE produtosnserv SET Codigo = '$dados[1]', Descricao = '$dados[2]', Garantia = '$dados[3]',
	Preco = '$dados[4]', PrecoInstalacao = '$dados[5]', Estoque = '$dados[6]', NF = '$dados[7]', NCM = '$dados[8]'
    WHERE ID_Produto = '$dados[0]'
    AND ID_Categoria = '$dados[9]'";

	echo mysqli_query($conexao, $sql);
}
// MÉTODO EXCLUIR 
public function excluirProduto($idProduto){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "DELETE from produtosnserv WHERE ID_Produto = '$idProduto' ";

	return mysqli_query($conexao, $sql);
}
}
?>