<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Pedidos.php";

$idPedido = $_POST['idPedido'];

$obj = new pedidos();

echo $obj -> excluirPedido($idPedido);
?>