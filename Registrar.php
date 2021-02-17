<?php
require_once "./Classes/Conexao.php";

$obj = new conectar();
$conexao = $obj->Conexao();

$sql = "SELECT * from usuarios WHERE grupo = 1";
$result = mysqli_query($conexao, $sql);

$validar = 0;
if (mysqli_num_rows($result) > 0) {
	header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php require_once "./Dependencias.php" ?>
	</head>

	<body class="bgGray">
		<div class="container conteudo">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-default painelLogin">
					<!-- PANEL HEADING -->
					<div class="panel-heading">
						REALIZE O PRIMEIRO CADASTRO!
					</div>
					<!-- PANEL BODY -->
					<div class="panel panel-body">
						<!-- FORMULÁRIO -->
						<form id="frmRegistro" class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>USUÁRIO<span class="required">*</span></label>
									<input type="text" class="form-control input-sm text-uppercase" id="usuario" name="usuario" maxlenght="100">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>NOME COMPLETO<span class="required">*</span></label>
									<input type="text" class="form-control input-sm text-uppercase" name="nome" id="nome" maxlenght="100">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>E-MAIL<span class="required">*</span></label>
									<input type="text" class="form-control input-sm text-uppercase" id="email" name="email" maxlenght="100">
								</div>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>SENHA<span class="required">*</span></label>
									<input type="password" class="form-control input-sm text-uppercase" id="senha"  name="senha" maxlenght="100">
								</div>
							</div>
							<!-- BOTÕES -->
							<div class="col-md-12 col-sm-12 col-xs-12 cabecalho bgGray">
								<div class="btnRight">
									<a class="btn btn-default" href="./index.php" title="VOLTAR">VOLTAR</a>
									<span class="btn btn-danger" id="registrar" title="REGISTRAR">REGISTRAR</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#registrar').click(function() {
			var usuario = frmRegistro.usuario.value;
			var nome = frmRegistro.nome.value;
			var email = frmRegistro.email.value;
			var senha = frmRegistro.senha.value;

			if ((usuario == "") || (nome == "") || (email == "") || (senha == "")) {
				alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
				return false;
			}

			dados = $('#frmRegistro').serialize();
			$.ajax({
				type: "POST",
				data: dados,
				url: "./Procedimentos/Login/CadastrarUsuario.php",
				success: function(r) {
					if (r == 1) {
						$('#frmRegistro')[0].reset();
						alertify.success("CADASTRO REALIZADO");
						window.location = "./index.php";
					} else {
						alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
					}
				}
			});
		});
	});
</script>