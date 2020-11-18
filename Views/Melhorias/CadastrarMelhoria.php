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
					<h3><strong>CADASTRAR MELHORIAS</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmMelhoria">
					    <!-- DESCRICAO -->
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>DESCRIÇÃO<span class="required">*</span></label>
								<textarea type="text" class="form-control input-sm text-uppercase" id="descricao" name="descricao" maxlenght="1000" rows="5" style="resize: none"></textarea>
							</div>
						</div>
						<!-- BOTÂO CADASTRAR -->
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario btnLeft">
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
		var descricao = $("#descricao").val();

		if (descricao == "") {
			alertify.error("PREENCHA O CAMPO 'DESCRIÇÃO'");
			return false;
		}

		dados = $('#frmMelhoria').serialize();

		$.ajax({
            type: "POST",
            data: dados,
            url: "./Procedimentos/Melhorias/CadastrarMelhoria.php",
            success: function(r) {
                if (r == 1) {
                    $('#frmMelhoria')[0].reset();
                    alertify.success("CADASTRO REALIZADO");
                } else {
                    alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
                }
            }
		});
	});
</script>
<?php
} else {
	header("location:./index.php");
}
?>