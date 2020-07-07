<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$obj= new usuarios;

echo json_encode($obj->obterDados($_POST['idusuario']));
 ?>