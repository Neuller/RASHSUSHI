<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Tecnicos.php";

$id = $_POST['idTecnicos'];

$obj = new tecnicos();

echo $obj->excluirTecnicos($id);
?>