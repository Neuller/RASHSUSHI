<!-- VERIFICA SESSÃO LOGADA --> 
<?php 
session_start();
if(isset($_SESSION['User'])){
?>

<!DOCTYPE html>
<html>
	<!-- MENU -->
	<head>
		<?php require_once "./Menu.php"; ?>
	</head>
<body>
	<div class="container">
		<!-- CABEÇALHO -->
        <div class="cabecalho bgGray">
			<div class="text-center textCabecalho opacidade">
				<h3><strong>USUÁRIOS</strong></h3>
			</div>
		</div>
		<!-- FORMULÁRIO DE CADASTRO --> 
		<div class="row">
			<div class="col-sm-4">
				<form id="frmUsuario">
					<!-- USUÁRIO -->
					<div class="mb-20px col-md-12 col-sm-12 col-xs-12">
						<label>USUÁRIO<span class="required">*</span></label>
						<input type="text" class="form-control input-sm align" name="usuario" id="usuario">
					</div>
					<!-- NOME -->
					<div class="mb-20px col-md-12 col-sm-12 col-xs-12">
						<label>NOME<span class="required">*</span></label>
						<input type="text" class="form-control input-sm" name="nome" id="nome">
					</div>
					<!-- E-MAIL -->
					<div class="mb-20px col-md-12 col-sm-12 col-xs-12">
						<label>E-MAIL<span class="required">*</span></label>
						<input type="text" class="form-control input-sm" name="email" id="email">
					</div>
					<!-- SENHA -->
					<div class="mb-20px col-md-12 col-sm-12 col-xs-12">
						<label>SENHA<span class="required">*</span></label>
						<input type="text" class="form-control input-sm" name="senha" id="senha">
					</div>
					<!-- BOTÂO CADASTRAR -->
					<div class="btnCadastrar">
						<span class="btn btn-primary" id="btnAdicionar" title="CADASTRAR">CADASTRAR</span>
					</div>
				</form>
			</div>
		<!-- TABELA --> 
		<div class="col-sm-7">
			<div id="tabelaUsuariosLoad"></div>
		</div>
		</div>
	</div>
	<!-- MODAL EDITAR -->
	<div class="modal fade" id="atualizaUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<!-- TÍTULO -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">EDITAR USUÁRIO</h4>
				</div>
				<!-- FORMULÁRIO -->
				<div class="modal-body">
					<form id="frmRegistroU">
						<!-- ID -->
						<div>
							<input type="text" hidden="" id="idUsuario" name="idUsuario">
						</div>
						<!-- NOME -->
						<div>
							<label>NOME</label>
							<input type="text" class="form-control input-sm" name="nomeU" id="nomeU">
						</div>
						<!-- USUÁRIO -->
						<div>
							<label>USUÁRIO</label>
							<input type="text" class="form-control input-sm" name="usuarioU" id="usuarioU">
						</div>
						<!-- E-MAIL -->
						<div>
							<label>E-MAIL</label>
							<input type="text" class="form-control input-sm" name="emailU" id="emailU">
						</div>
					</form>
				</div>
				<!-- BOTÃO EDITAR --> 
				<div class="modal-footer">
					<button id="btnAtualizaUsuario" type="button" class="btn btn-warning" data-dismiss="modal">EDITAR</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<!-- SCRIPT --> 
<script type="text/javascript">
	// CARREGAR TABELA
	$(document).ready(function(){
		$('#tabelaUsuariosLoad').load('./Views/Usuarios/TabelaUsuarios.php');
			$('#btnAdicionar').click(function(){
				// VALIDAR CAMPOS
				vazios=validarFormVazio('frmUsuario');
			if(vazios > 0){
				alertify.alert("ATENÇÃO","Preencha todo(s) o(s) campo(s).");
				return false;
			}
		datos=$('#frmUsuario').serialize();
		$.ajax({
			type:"POST",
			data:dados,
			url:"./Procedimentos/Login/RegistrarUsuarios.php",
			success:function(r){
				if(r==1){
					$('#frmUsuario')[0].reset();
					$('#tabelaUsuariosLoad').load('./Views/Usuarios/TabelaUsuarios.php');
					alertify.success("Cadastro realizado com sucesso");
				}else{
					alertify.error("Não foi possível adicionar");
				}
			}
		});
		});
	});
	// PREENCHER MODAL DE EDIÇÂO
	function adicionarDados(idusuario){
		$.ajax({
			type:"POST",
			data:"idusuario=" + idusuario,
			url:"./Procedimentos/Usuarios/ObterDados.php",
				success:function(r){
					dado=jQuery.parseJSON(r);
					$('#idUsuario').val(dado['ID']);
					$('#usuarioU').val(dado['usuario']);
					$('#nomeU').val(dado['nome']);
					$('#emailU').val(dado['email']);
				}
		});
	}
	// EXCLUIR 
	function eliminarUsuario(idusuario){
		alertify.confirm('ATENÇÃO','Realmente deseja excluir?', function(){ 
			$.ajax({
				type:"POST",
				data:"idusuario=" + idusuario,
				url:"./Procedimentos/Usuarios/EliminarUsuario.php",
					success:function(r){
						if(r==1){
							$('#tabelaUsuariosLoad').load('./Views/Usuarios/TabelaUsuarios.php');
							alertify.success("Registro excluído com sucesso");
						}else{
							alertify.error("Não foi possível excluir");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelado')
			});
	}
	// EDITAR 
	$(document).ready(function(){
		$('#btnAtualizaUsuario').click(function(){
			dados=$('#frmRegistroU').serialize();
				$.ajax({
				type:"POST",
				data:dados,
				url:"./Procedimentos/Usuarios/AtualizarUsuario.php",
					success:function(r){
						if(r==1){
							$('#tabelaUsuariosLoad').load('./Views/Usuarios/TabelaUsuarios.php');
							alertify.success("Registro atualizado com sucesso");
						}else{
							alertify.error("Não foi possível atualizar");
						}
					}
				});
		});
	});
</script>

<style>
.cabecalho{
	margin-bottom: 50px;
}
</style>

<!-- SE NÂO ESTIVAR LOGADO RETORNA À PÁGINA INICIAL --> 
<?php
}else{
	header("location:./index.php");
}
?>