<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Servicos.php";

$obj = new servicos();

$dados = array(
$_POST['idServico'],
$_POST['selectStatusU'] = strtoupper($_POST['selectStatusU']),
$_POST['servicoU'] = strtoupper($_POST['servicoU']),
$_POST['tecnicoU'] = strtoupper($_POST['tecnicoU']),
$_POST['informacaoU'] = strtoupper($_POST['informacaoU']),
$_POST['garantiaU'] = strtoupper($_POST['garantiaU']),
$_POST['precoU'] = strtoupper($_POST['precoU']),
$_POST['dataSaidaU'] = strtoupper($_POST['dataSaidaU']),
$_POST['diagnosticoU'] = strtoupper($_POST['diagnosticoU'])
);

echo $obj-> editarServico($dados);
?>