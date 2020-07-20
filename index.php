<?php
require_once "./Classes/Conexao.php";

$obj = new conectar();
$conexao = $obj->Conexao();

$sql = "SELECT * from usuarios WHERE usuario = 'admin' or 'ADMIN' ";
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
						<img src="Img/NSERV.png" width="100%">
					</div>
					<!-- FORMULÁRIO -->
					<form id="frmLogin" class="col-md-12 col-sm-12 col-xs-12">
						<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
							<div>
								<label>USUÁRIO<span class="required">*</span></label>
								<input type="text" class="form-control input-sm text-uppercase" name="usuario" id="usuario">
							</div>
						</div>
						<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
							<div>
								<label>SENHA<span class="required">*</span></label>
								<input type="password" name="senha" id="senha" class="form-control input-sm text-uppercase">
							</div>
						</div>
						<!-- BOTÃO ENTRAR -->
						<div class="btnEntrar">
							<span class="btn btn-primary btn-sm" id="entrar" title="ENTRAR">ENTRAR</span>
						</div>
						<?php if (!$validar) : ?>
							<a href="Registrar.php" class="btn btn-danger btn-sm" title="REGISTRAR">REGISTRAR</a>
						<?php endif; ?>
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

			vazios = validarFormVazio('frmLogin');

			if (vazios > 0) {
				alertify.error("PREENCHA TODOS OS CAMPOS");
				return false;
			}

			dados = $('#frmLogin').serialize();
			$.ajax({
				type: "POST",
				data: dados,
				url: "Procedimentos/Login/Login.php",
				success: function(r) {
					if (r == 1) {
						window.location = "./Inicio.php";
					} else {
						alertify.error("ACESSO NEGADO");
					}
				}
			});
		});
		$("#senha").keypress(function(event) { 
            if (event.keyCode === 13) { 
                $("#entrar").click(); 
            } 
        }); 
	});	
</script>

<style>
	.painelLogin{
		margin-top: 25%;
	}
</style>