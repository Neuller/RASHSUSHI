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
				<h3><strong>STATUS</strong></h3>
			</div>
		</div>
		<!-- FORMULÁRIO DE CADASTRO -->
		<div class="row">
			<div class="col-sm-4" align="center">
				<form id="frmStatus">	
					<!-- DESCRIÇÂO -->				
					<div>
						<label class="required">DESCRIÇÃO*</label>
						<input type="text" class="form-control input-sm align" name="descricao" id="descricao">
					</div>
					<!-- BOTÂO CADASTRAR -->
					<span class="btn btn-primary" id="btnAdicionarStatus">CADASTRAR</span>
				</form>
			</div>
		<!-- TABELA --> 
		<div class="col-sm-6">
			<div id="tabelaStatusLoad"></div>
		</div>
		</div>
	</div>
	<!-- MODAL EDITAR -->
	<div class="modal fade" id="atualizaStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<!-- TÍTULO -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">EDITAR STATUS</h4>
				</div>
				<!-- FORMULÁRIO -->
				<div class="modal-body">
					<form id="frmStatusU">
						<!-- ID -->
						<div>
							<input type="text" hidden="" id="idstatus" name="idstatus">
						</div>
						<!-- DESCRIÇÂO -->
						<div>
							<label class="required">DESCRIÇÃO</label>		
							<input type="text" id="descricaoU" name="descricaoU" class="form-control input-sm">
						</div>
					</form>
				</div>
				<!-- BOTÃO EDITAR --> 
				<div class="modal-footer">
					<button type="button" id="btnAtualizaStatus" class="btn btn-warning" data-dismiss="modal">EDITAR</button>
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
		$('#tabelaStatusLoad').load("./Views/Status/TabelaStatus.php");
			$('#btnAdicionarStatus').click(function(){
				// VALIDAR CAMPOS
				vazios=validarFormVazio('frmStatus');
				if(vazios > 0){
					alertify.alert("ATENÇÃO","Preencha o(s) campo(s) vazio(s).");
					return false;
				}
				dados=$('#frmStatus').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"./Procedimentos/Status/AdicionarStatus.php",
					success:function(r){
						if(r==1){
					$('#frmStatus')[0].reset();
					$('#tabelaStatusLoad').load("./Views/Status/TabelaStatus.php");
					alertify.success("Cadastro realizado com sucesso");
					}else{
						alertify.error("Não foi possível adicionar");
					}
					}
				});
			});
	});
	// PREENCHER MODAL DE EDIÇÂO
	function adicionarDado(idstatus,descricao){
			$('#idstatus').val(idstatus);
			$('#descricaoU').val(descricao);
	}
	// EXCLUIR 
	function eliminarStatus(idstatus){
		alertify.confirm('ATENÇÃO','Realmente deseja excluir?', function(){ 
			$.ajax({
				type:"POST",
				data:"idstatus=" + idstatus,
				url:"./Procedimentos/Status/DeletarStatus.php",
					success:function(r){
						if(r==1){
							$('#tabelaStatusLoad').load("./Views/Status/TabelaStatus.php");
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
		$('#btnAtualizaStatus').click(function(){
			dados=$('#frmStatusU').serialize();
			$.ajax({
				type:"POST",
				data:dados,
				url:"./Procedimentos/Status/AtualizarStatus.php",
				success:function(r){
					if(r==1){
						$('#tabelaStatusLoad').load("./Views/Status/TabelaStatus.php");
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