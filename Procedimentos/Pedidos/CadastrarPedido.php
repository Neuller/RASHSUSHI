<?php 
	session_start();
	require_once "../../Classes/Conexao.php";
    require_once "../../Classes/Pedidos.php";
	
	$c= new conectar();
	$obj= new pedidos();

	$dados = array(
		$_POST['enderecoEntrega'] = strtoupper($_POST['enderecoEntrega']),		
		$_POST['troco'] = strtoupper($_POST['troco']),
		$_POST['valorPagamento'] = strtoupper($_POST['valorPagamento']),
		$_POST['formaPagamento'] = strtoupper($_POST['formaPagamento'])
	);

	if(count($_SESSION['tabelaTemporaria']) == 0){
		echo 0;
	}else{
		$result = $obj -> cadastrarPedido($dados);
		unset($_SESSION['tabelaTemporaria']);
		echo $result;
	}
?>