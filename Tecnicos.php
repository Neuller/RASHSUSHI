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
				<h3><strong>TÉCNICOS</strong></h3>
			</div>
		</div>
		<!-- FORMULÁRIO DE CADASTRO --> 
		<div class="row">
        <div class="col-sm-4" align="center">
				<form id="frmTecnicos">
                    <!-- NOME -->
					<div>
						<label class="required">NOME COMPLETO*</label>
						<input type="text" class="form-control input-sm align" id="nome" name="nome" maxlenght="50">
					</div>
                    <!-- ENDEREÇO -->
					<div>
						<label class="required">ENDEREÇO</label>
						<input type="text" class="form-control input-sm align" id="endereco" name="endereco" maxlenght="100">
					</div>
                    <!-- BOTÂO CADASTRAR -->
					<span class="btn btn-primary" id="btnAdicionar">CADASTRAR</span>
                </form>
		</div>
        <!-- TABELA --> 
        <div class="col-sm-6">
            <div id="tabelaTecnicosLoad"></div>
        </div>
        </div>
    </div>
    <!-- MODAL EDITAR -->
	<div class="modal fade" id="atualizaTecnicos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<!-- TÍTULO -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">EDITAR TÉCNICOS</h4>
				</div>
				<!-- FORMULÁRIO -->
				<div class="modal-body">
					<form id="frmTecnicosU">
						<!-- ID -->
						<div>
							<input type="text" hidden="" id="idTecnicos" name="idTecnicos">
						</div>
						<!-- NOME -->
                        <div>
                            <label class="required">NOME COMPLETO*</label>
                            <input type="text" class="form-control input-sm align" id="nomeU" name="nomeU" maxlenght="50">
                        </div>
                        <!-- ENDEREÇO -->
                        <div>
                            <label class="required">ENDEREÇO</label>
                            <input type="text" class="form-control input-sm align" id="enderecoU" name="enderecoU" maxlenght="100">
                        </div>
                        </form>
                    </div>
                    <!-- BOTÃO EDITAR --> 
                    <div class="modal-footer">
                        <button type="button" id="btnAtualizar" class="btn btn-warning" data-dismiss="modal">EDITAR</button>
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
		$('#tabelaTecnicosLoad').load("./Views/Tecnicos/TabelaTecnicos.php");
			$('#btnAdicionar').click(function(){
				// VALIDAR CAMPOS
				vazios=validarFormVazio('frmTecnicos');
				if(vazios > 0){
					alertify.alert("ATENÇÃO","Preencha o(s) campo(s) vazio(s).");
					return false;
				}
				dados=$('#frmTecnicos').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"./Procedimentos/Tecnicos/AdicionarTecnicos.php",
					success:function(r){
						if(r==1){
					$('#frmTecnicos')[0].reset();
					$('#tabelaTecnicosLoad').load("./Views/Tecnicos/TabelaTecnicos.php");
					alertify.success("Cadastro realizado com sucesso");
					}else{
						alertify.error("Não foi possível adicionar");
					}
					}
				});
			});
	});
	// PREENCHER MODAL DE EDIÇÂO
	function adicionarDados(idTecnicos){
		$.ajax({
				type:"POST",
				data:"idTecnicos=" + idTecnicos,
				url:"./Procedimentos/Tecnicos/ObterDadosTecnicos.php",
					success:function(r){
						dado=jQuery.parseJSON(r);
						$('#idTecnicos').val(dado['idTecnicos']);
						$('#nomeU').val(dado['nome']);
						$('#enderecoU').val(dado['endereco']);
					}
		});
	}
	// EXCLUIR 
	function eliminarTecnicos(idTecnicos){
		alertify.confirm('ATENÇÃO','Realmente deseja excluir?', function(){ 
			$.ajax({
				type:"POST",
				data:"idTecnicos=" + idTecnicos,
				url:"./Procedimentos/Tecnicos/DeletarTecnicos.php",
					success:function(r){
						if(r==1){
							$('#tabelaTecnicosLoad').load("./Views/Tecnicos/TabelaTecnicos.php");
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
		$('#btnAtualizar').click(function(){
			dados=$('#frmTecnicosU').serialize();
			$.ajax({
				type:"POST",
				data:dados,
				url:"./Procedimentos/Tecnicos/AtualizarTecnicos.php",
				success:function(r){
					if(r==1){
						$('#tabelaTecnicosLoad').load("./Views/Tecnicos/TabelaTecnicos.php");
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