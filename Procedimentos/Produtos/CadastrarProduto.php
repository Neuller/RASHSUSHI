<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Produtos.php";

$obj = new produtos();

$idUsuario = $_SESSION['IDUser'];

$dados = array(
$_POST['categoriaSelect'] = strtoupper($_POST['categoriaSelect']),
$idUsuario,
$_POST['descricao'] = strtoupper($_POST['descricao']),		
$_POST['quantidade'] = strtoupper($_POST['quantidade']),
$_POST['valor_unidade'] = strtoupper($_POST['valor_unidade'])
);

echo $obj-> cadastrarProduto($dados);
?>