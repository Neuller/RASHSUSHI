<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Combinados.php";

$obj = new combinados();

$idUsuario = $_SESSION['IDUser'];

$dados = array(
$_POST['produtoSelect'] = strtoupper($_POST['produtoSelect']),
$idUsuario,
$_POST['descricao'] = strtoupper($_POST['descricao']),		
$_POST['quantidade_pecas'] = strtoupper($_POST['quantidade_pecas']),
$_POST['valor_total'] = strtoupper($_POST['valor_total'])
);

echo $obj-> cadastrarCombinado($dados);
?>