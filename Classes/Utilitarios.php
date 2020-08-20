<?php
class utilitarios
{
	// CONVERTE DATA
	public function data($data)
	{
		return date("d/m/Y", strtotime($data));
	}
	// RETORNA NOME DO COLABORADOR
	public function nomeColaborador($ID)
	{
		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "SELECT nome 
	FROM usuarios 
	WHERE ID = '$ID'";

		$resultado = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($resultado);

		return $mostrar[0];
	}
	// RETORNA NOME DO TECNICO
	public function nomeTecnico($idTecnico)
	{
		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "SELECT nome FROM tecnicos WHERE idTecnico = '$idTecnico'";

		$resultado = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($resultado);

		return $mostrar[0];
	}
	// RETORNA NOME DO STATUS
	public function nomeStatus($idStatus)
	{
		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "SELECT Nome_Status FROM status WHERE ID_Status = '$idStatus'";

		$resultado = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($resultado);

		return $mostrar[0];
	}
	// RETORNA DADOS RESUMIDOS DO CLIENTE
	public function dadosResumidoCliente($idCliente)
	{
		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "SELECT Nome, Telefone, Celular FROM clientes WHERE ID_Cliente = '$idCliente'";

		$resultado = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($resultado);

		return $mostrar;
	}
}
