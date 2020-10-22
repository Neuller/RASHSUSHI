<?php
session_start();
require_once "../../Classes/Conexao.php";

$c = new conectar();
$conexao = $c->conexao();

$idCliente = $_POST['clienteSelect'];
$idProduto = $_POST['produtoSelect'];
$quantidade = $_POST['quantidade'];
$valor_unidade = $_POST['valor_unidade'];

$sql = "SELECT nome FROM clientes WHERE id_cliente = '$idCliente'";

$result = mysqli_query($conexao, $sql);
$nomeCliente = mysqli_fetch_row($result)[0];

$descricao = $_POST['descricao'];


$item = $idProduto . "||" .
	$descricao . "||" .
	$valor_unidade . "||" .
	$nomeCliente . "||" .
	$quantidade . "||" .
	$quantidade * $valor_unidade . "||" .
	$idCliente;

$_SESSION['tabelaTemporaria'][] = $item;
?>