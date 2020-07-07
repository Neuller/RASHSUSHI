<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$obj= new usuarios;

echo $obj->excluir($_POST['idusuario']);
 ?>