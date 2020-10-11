<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once "../../Classes/Conexao.php"; 
		$c = new conectar();
		$conexao = $c -> conexao();
		?>
    </head>
	<body>
		<div class="container">
			<div class="cabecalho bgGradient">
				<div class="text-center textCabecalho_White opacidade">
					<h3><strong>CADASTRAR CATEGORIA</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmCategoria">
						<div>
							<!-- DESCRIÇÃO -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
                                <hr>
								<div>
									<label>DESCRIÇÃO<span class="required">*</span></label>
									<input type="text" class="form-control input-sm text-uppercase" id="descricao" name="descricao" maxlenght="100">
								</div>
							</div>
							<!-- BOTÂO CADASTRAR -->
							<div class="btnCadastrar">
								<span class="btn btn-primary" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
							</div>
					</form>
				</div>
			</div>
		</div>
	</body>

</html>

<script type="text/javascript">
	$(document).ready(function($) {
	
	});

    $('#btnCadastrar').click(function() {
		var descricao = frmCategoria.descricao.value;
        
        if (descricao == "") {
			alertify.error("PREENCHA O CAMPO 'DESCRIÇÃO'");
			return false;
		}
                
        dados = $('#frmCategoria').serialize();
        
        $.ajax({
			type: "POST",
			data: dados,
			url: "./Procedimentos/Categorias/CadastrarCategoria.php",
			success: function(r) {
			if (r == 1) {
			$('#frmCategoria')[0].reset();
				alertify.success("CADASTRO REALIZADO");
			} else {
				alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
			}
			}
		});
    });
</script>
<style>
	.cabecalho {
		margin-bottom: 50px;
	}
</style>
<?php
} else {
	header("location:./index.php");
}
?>