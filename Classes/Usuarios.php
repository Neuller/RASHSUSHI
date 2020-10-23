<?php 
class usuarios{
	public function cadastrarPrimeiroUsuario($dados){
		$c = new conectar();
		$conexao = $c->conexao();

		$data = date('Y-m-d');

		$sql = "INSERT into usuarios (usuario, nome, email, grupo, senha) 
		VALUES ('$dados[0]','$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]')";

		return mysqli_query($conexao, $sql);
	}
	
	public function cadastrarUsuario($dados){
		$c = new conectar();
		$conexao = $c->conexao();

		$data = date('Y-m-d');

		$sql = "INSERT into usuarios (usuario, nome, email, grupo, senha, data_cadastro, cpf, cnpj, cep, 
		bairro, endereco, uf, numero, complemento, telefone, telefone2, celular, celular2) 
		VALUES ('$dados[0]','$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$data', '$dados[5]', '$dados[6]', '$dados[7]', 
		'$dados[8]', '$dados[9]', '$dados[10]', '$dados[11]', '$dados[12]', '$dados[13]', '$dados[14]', '$dados[15]', '$dados[16]')";

		return mysqli_query($conexao, $sql);
	}

	public function login($dados){
		$c = new conectar();
		$conexao = $c->conexao();

		$senha = sha1($dados[1]);

		$_SESSION['User'] = $dados[0];
		$_SESSION['IDUser'] = self::obter_id_usuario($dados);

		$sql = "SELECT * from usuarios 
		WHERE usuario = '$dados[0]' and senha = '$senha' ";

		$result = mysqli_query($conexao, $sql);

		if (mysqli_num_rows($result) > 0){
			return 1;
		}else{
			return 0;
		}
	}

	public function obter_id_usuario($dados){
		$c = new conectar();
		$conexao = $c->conexao();

		$senha = sha1($dados[1]);

		$sql = "SELECT id_usuario from usuarios
		WHERE usuario = '$dados[0]' and senha = '$senha' ";

		$result = mysqli_query($conexao, $sql);

		return mysqli_fetch_row($result)[0];
	}

	public function obterDados($idUsuario){
		$c = new conectar();

		$conexao=$c->conexao();

		$sql="SELECT usuario, nome, email, grupo, data_cadastro, cpf, cnpj, cep, bairro, endereco, uf, numero, 
		complemento, telefone, telefone2, celular, celular2 
		FROM usuarios 
		WHERE id_usuario = '$idUsuario'";

		$result = mysqli_query($conexao, $sql);

		$mostrar = mysqli_fetch_row($result);

		$dados=array(
		'usuario' => $mostrar[0],
		'nome' => $mostrar[1],
		'email' => $mostrar[2],
		'grupo' => $mostrar[3],
		'data_cadastro' => $mostrar[4],
		'cpf' => $mostrar[5],
		'cnpj' => $mostrar[6],
		'cep' => $mostrar[7],
		'bairro' => $mostrar[8],
		'endereco' => $mostrar[9],
		'uf' => $mostrar[10],
		'numero' => $mostrar[11],
		'complemento' => $mostrar[12],
		'telefone' => $mostrar[13],
		'telefone2' => $mostrar[14],
		'celular' => $mostrar[15],
		'celular2' => $mostrar[16],
		);

		return $dados;
	}
}
?>
