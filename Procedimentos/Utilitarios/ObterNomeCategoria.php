<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Utilitarios.php";

$obj = new utilitarios();

echo json_encode($obj -> obterNomeCategoria($_POST['idCategoria']));
?>