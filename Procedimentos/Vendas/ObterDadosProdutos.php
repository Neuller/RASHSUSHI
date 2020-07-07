<?php
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Vendas.php";

$obj= new vendas();

echo json_encode($obj->obterDadosProdutos($_POST['idProduto']));
?>