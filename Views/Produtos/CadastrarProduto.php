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
					<h3><strong>CADASTRAR PRODUTO</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmProduto">
						<div>
							<!-- DESCRIÇÃO -->
							<div class="col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
									<label>DESCRIÇÃO<span class="required">*</span></label>
									<input type="text" class="form-control input-sm text-uppercase" id="descricao" name="descricao" maxlenght="100">
								</div>
							</div>
                            <!-- CATEGORIA -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormularioCadastro">
                                <div>
                                    <label>CATEGORIA<span class="required">*</span></label>
                                    <select class="form-control input-sm" id="categoriaSelect" name="categoriaSelect">
                                        <option value="">SELECIONE UMA CATEGORIA</option>
                                        <?php
                                        $sql = "SELECT id_categoria, descricao FROM produtos_categoria ORDER BY id_categoria DESC";
                                        $result = mysqli_query($conexao, $sql);

                                        while ($categoria = mysqli_fetch_row($result)) :
                                        ?>
                                            <option value="<?php echo $categoria[0] ?>"><?php echo $categoria[1] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- QUANTIDADE -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormularioCadastro">
                                <div>
                                    <label>QUANTIDADE</label>
                                    <input type="number" class="form-control input-sm estoque text-uppercase" id="quantidade" name="quantidade" maxlenght="100">
                                </div>
                            </div>
                            <!-- VALOR UNIDADE -->
                            <div class="col-md-4 col-sm-4 col-xs-4 itensFormularioCadastro">
                                <div>
                                    <label>VALOR UNITÁRIO<span class="required">*</span></label>
                                    <input type="number" class="form-control input-sm text-uppercase" id="valor_unidade" name="valor_unidade" maxlenght="100">
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
		var descricao = frmProduto.descricao.value;
        var categoria = frmProduto.categoriaSelect.value;
        var valor_unidade = frmProduto.valor_unidade.value;
        
        if ((descricao == "") || (categoria == "") || (valor_unidade == "")) {
			alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
			return false;
		}
                
        dados = $('#frmProduto').serialize();
        
        $.ajax({
			type: "POST",
			data: dados,
			url: "./Procedimentos/Produtos/CadastrarProduto.php",
			success: function(r) {
                if (r == 1) {
                $('#frmProduto')[0].reset();
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