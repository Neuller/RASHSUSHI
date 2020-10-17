<?php 
	session_start();
	$index = $_POST['index'];
	unset($_SESSION['tabelaTemporaria'][$index]);
	$dados = array_values($_SESSION['tabelaTemporaria']);
	unset($_SESSION['tabelaTemporaria']);
	$_SESSION['tabelaTemporaria'] = $dados;
?>