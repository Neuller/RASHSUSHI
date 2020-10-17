<?php 
	session_start();
	require_once "../../Classes/Conexao.php";
    require_once "../../Classes/Pedidos.php";
	
	$c= new conectar();
	$obj= new pedidos();

	if(count($_SESSION['tabelaTemporaria']) == 0){
		echo 0;
	}else{
		$result = $obj -> cadastrarPedido();
		unset($_SESSION['tabelaTemporaria']);
		echo $result;
	}
?>