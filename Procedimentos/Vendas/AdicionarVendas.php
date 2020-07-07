<?php 
	session_start();
	require_once "../../Classes/Conexao.php";
    require_once "../../Classes/Vendas.php";
	
	$obj= new vendas();
	$c= new conectar();

	if(count($_SESSION['tabelaVendasTemp'])==0){
		echo 0;
	}else{
		$result=$obj->adicionarVenda();
		unset($_SESSION['tabelaVendasTemp']);
		echo $result;
	}
?>