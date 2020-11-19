<?php
class utilitarios{
	public function data($data){
		return date("d/m/Y h:i:s", strtotime($data));
	}

	public function converterData($data){
		return date("d/m/Y", strtotime($data));
	}

	public function obterNomeCliente($idCliente){
		$c = new conectar();
		$conexao = $c -> conexao();
	
		$sql = "SELECT nome 
		FROM clientes 
		WHERE id_cliente = '$idCliente'";
	
		$result = mysqli_query($conexao,$sql);
		$mostrar = mysqli_fetch_row($result);
	
		return $mostrar[0];
	}

	public function obterCelularCliente($idCliente){
		$c = new conectar();
		$conexao = $c -> conexao();
	
		$sql = "SELECT celular 
		FROM clientes 
		WHERE id_cliente = '$idCliente'";
	
		$result = mysqli_query($conexao,$sql);
		$mostrar = mysqli_fetch_row($result);
	
		return $mostrar[0];
	}

	public function obterNomeCategoria($idCategoria){
		$c = new conectar();
		$conexao = $c -> conexao();
	
		$sql = "SELECT descricao 
		FROM produtos_categoria 
		WHERE id_categoria = '$idCategoria'";
	
		$result = mysqli_query($conexao,$sql);
		$mostrar = mysqli_fetch_row($result);
	
		return $mostrar[0];
	}

	public function obterNomeEntregador($idEntregador){
		$c = new conectar();
		$conexao = $c -> conexao();
	
		$sql = "SELECT nome 
		FROM entregadores 
		WHERE id_entregador = '$idEntregador'";
	
		$result = mysqli_query($conexao,$sql);
		$mostrar = mysqli_fetch_row($result);
	
		return $mostrar[0];
	}
}
