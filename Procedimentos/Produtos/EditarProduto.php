<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Produtos.php";

$obj = new produtos();

$dados = array(
$_POST['idProdutoU'],
$_POST['categoriaSelectU'] = strtoupper($_POST['categoriaSelectU']),
$_POST['descricaoU'] = strtoupper($_POST['descricaoU']),
$_POST['quantidadeU'] = strtoupper($_POST['quantidadeU']),
$_POST['valor_unidadeU'] = strtoupper($_POST['valor_unidadeU'])
);

echo $obj-> editarProduto($dados);
?>