<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Categorias.php";

$obj = new categorias();

$idUsuario = $_SESSION['IDUser'];

$dados = array(
$idUsuario,
$_POST['descricao'] = strtoupper($_POST['descricao'])		
);

echo $obj-> cadastrarCategoria($dados);
?>