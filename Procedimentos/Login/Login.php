<?php 
session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$obj = new usuarios();

$dados = array(
$_POST['usuario'] = strtoupper($_POST['usuario']),
$_POST['senha']
);

echo $obj-> login($dados);
?>