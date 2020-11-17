<?php 
	session_start();
	require_once "../../Classes/Conexao.php";
    require_once "../../Classes/Financas.php";
	
	$c= new conectar();
	$obj= new financas();

	$dados = array(
		$_POST['descricao'] = strtoupper($_POST['descricao']),		
		$_POST['tipoFinanca'] = strtoupper($_POST['tipoFinanca']),
		$_POST['valor'] = strtoupper($_POST['valor'])
	);

	echo $obj-> cadastrarFinanca($dados);
?>