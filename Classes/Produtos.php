<?php 
class produtos{
// MÉTODO ADICIONAR
public function adicionarProduto($dados){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "INSERT INTO produtosnserv (ID_Categoria, Codigo, Descricao, Garantia, Preco, PrecoInstalacao, Estoque, NF, NCM) 
	VALUES ('$dados[1]','$dados[0]', '$dados[2]','$dados[3]', '$dados[5]', '$dados[6]', '$dados[4]', '$dados[7]', '$dados[8]')";

	return mysqli_query($conexao, $sql);
}
// MÉTODO RETORNAR DADOS 
public function obterDadosProdutos($idProduto){
	$c = new conectar();
	$conexao = $c->conexao();

	$sql = "SELECT ID_Produto, ID_Categoria, Codigo, Descricao, Garantia, Preco, 
	PrecoInstalacao, Estoque, NF, NCM
	FROM produtosnserv WHERE ID_Produto = '$idProduto' ";

	$result = mysqli_query($conexao, $sql);
	$mostrar = mysqli_fetch_row($result);

	$dados = array(
		'ID_Produto' => $mostrar[0],
		'ID_Categoria' => $mostrar[1],
		'Codigo' => $mostrar[2],
		'Descricao' => $mostrar[3],
		'Garantia' => $mostrar[4],
		'Preco' => $mostrar[5],
		'PrecoInstalacao' => $mostrar[6],
		'Estoque' => $mostrar[7],
		'NF' => $mostrar[8],
		'NCM' => $mostrar[9]
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