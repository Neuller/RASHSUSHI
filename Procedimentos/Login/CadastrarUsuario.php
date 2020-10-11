<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$obj = new usuarios();

// GRUPO ADMINISTRADOR
$grupo = 1;
$senha = sha1($_POST['senha']);

$dados = array(
$_POST['usuario'] = strtoupper($_POST['usuario']),
$_POST['nome'] = strtoupper($_POST['nome']),
$_POST['email'] = strtoupper($_POST['email']),
$grupo,
$senha
);

echo $obj-> cadastrarPrimeiroUsuario($dados);
?>