<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Produtos.php";

$idProduto = $_POST['idProduto'];

$obj = new produtos();

echo $obj->excluirProduto($idProduto);
?>