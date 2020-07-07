<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Tecnicos.php";

$obj = new tecnicos();

$dados = array(
$_POST['idTecnicos'],
$_POST['nomeU'],
$_POST['enderecoU']
);

echo $obj-> editarTecnicos($dados);
?>