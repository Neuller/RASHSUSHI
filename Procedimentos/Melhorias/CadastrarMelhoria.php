<?php 
	session_start();
	require_once "../../Classes/Conexao.php";
    require_once "../../Classes/Melhorias.php";
	
	$c= new conectar();
	$obj= new melhorias();

	$dados = array(
		$_POST['descricao'] = strtoupper($_POST['descricao'])
	);

	echo $obj-> cadastrarMelhoria($dados);
?>