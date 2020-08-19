<?php
session_start();
require_once "../../Classes/Conexao.php";

$c = new conectar();
$conexao = $c->conexao();

$idCliente = $_POST['clienteSelect'];
$idProduto = $_POST['produtoSelect'];
$quantidadeEstoque = $_POST['estoqueView'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['precoView'];

$sql = "SELECT Nome 
    FROM clientes 
    WHERE ID_Cliente = '$idCliente'";

$result = mysqli_query($conexao, $sql);
$nomeCliente = mysqli_fetch_row($result)[0];

$sql = "SELECT Descricao 
	FROM produtosnserv
    WHERE ID_Produto = '$idProduto'";

$result = mysqli_query($conexao, $sql);
$descricao = mysqli_fetch_row($result)[0];

$produto = $idProduto . "||" .
	$descricao . "||" .
	$preco . "||" .
	$nomeCliente . "||" .
	$quantidadeEstoque . "||" .
	$quantidade . "||" .
	$quantidade * $preco . "||" .
	$idCliente;

$_SESSION['tabelaVendasTemp'][] = $produto;

$quantidadeNova = $quantidadeEstoque - $quantidade;
$sqlU = "UPDATE produtosnserv SET Estoque = '$quantidadeNova' WHERE ID_Produto = '$idProduto' ";
mysqli_query($conexao, $sqlU);
