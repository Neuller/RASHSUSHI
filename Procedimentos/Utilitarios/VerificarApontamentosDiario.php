<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Pedidos.php";

$obj = new pedidos();
$data = $_POST['data'];

echo json_encode($obj -> verificarApontamentosDiario($data));
?>