<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$obj= new usuarios();

$dados=array(
$_POST['idUsuario'],  
$_POST['usuarioU'], 
$_POST['nomeU'],  
$_POST['emailU']
);  
	
echo $obj->atualizar($dados);
?>