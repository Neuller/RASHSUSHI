<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Combinados.php";

$obj = new combinados();

echo json_encode($obj -> obterCombinados($_POST['idProduto']));
?>