<?php
require_once "./Classes/Conexao.php";

$obj = new conectar();
$conexao = $obj->Conexao();

$sql = "SELECT * from usuarios WHERE grupo = 1";
$result = mysqli_query($conexao, $sql);

$validar = 0;
if (mysqli_num_rows($result) > 0) {
	$validar = 1;
}
?>

<?php require_once "./Dependencias.php" ?>

<!DOCTYPE html>
<html lang="pt-br" class="Personalizado">

<body class="bgGray">
	<div class="container conteudo">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-default painelLogin">
				<!-- PANEL HEADING -->
				<div class="panel-heading">
					OLÁ! ACESSE JÁ.
				</div>
				<!-- PANEL BODY -->
				<div class="panel panel-body">
					<!-- IMAGEM -->
					<div class="imagemPainel">
						<img src="Img/RASHSUSHI.png" width="100%">
					</div>
					<!-- FORMULÁRIO -->
					<form id="frmLogin" class="col-md-12 col-sm-12 col-xs-12">
						<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
							<div>
								<label>USUÁRIO<span class="required">*</span></label>
								<input type="text" class="form-control input-sm text-uppercase" id="usuario" name="usuario">
							</div>
						</div>
						<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
							<div>
								<label>SENHA<span class="required">*</span></label>
								<input type="password" class="form-control input-sm text-uppercase" id="senha" name="senha">
							</div>
						</div>
						<!-- BOTOES -->
						<div class="btns">
							<span class="btn btn-primary btn-sm" id="entrar" title="ENTRAR">ENTRAR</span>
							<?php if (!$validar) : ?>
								<a href="./Registrar.php" class="btn btn-danger btn-sm" id="registrar" title="REGISTRAR">REGISTRAR</a>
							<?php endif; ?>
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
		$('#entrar').click(function() {
			var usuario = frmLogin.usuario.value;
			var senha = frmLogin.senha.value;

			if ((usuario == "") || (senha == "")) {
				alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
				return false;
			}

			dados = $('#frmLogin').serialize();
			$.ajax({
				type: "POST",
				data: dados,
				url: "Procedimentos/Login/Login.php",
				success: function(r) {
					if (r == 1) {
						window.location = "./Principal.php";
					} else {
						alertify.error("ACESSO NEGADO");
					}
				}
			});
		});

		$("#usuario").keypress(function(event) { 
            if (event.keyCode === 13) { 
                $("#entrar").click(); 
            } 
        }); 
		$("#senha").keypress(function(event) { 
            if (event.keyCode === 13) { 
                $("#entrar").click(); 
            } 
        }); 
	});	
</script>