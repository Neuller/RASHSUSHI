<?php 
session_start();

require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";

$idusuario = $_SESSION['IDUser'];
$idcliente = $_POST['clienteSelect'];
$idstatus = $_POST['StatusSelect'];


$obj = new servicos();

$dados = array(
$idcliente,
$idusuario,
$idstatus,
$_POST['equipamento'] = strtoupper($_POST['equipamento']),	
$_POST['informacao'] = strtoupper($_POST['informacao']),
$_POST['serialnumber'] = strtoupper($_POST['serialnumber'])
);

echo $obj-> adicionarServico($dados);
?>