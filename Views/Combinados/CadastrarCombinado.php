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
					<h3><strong>CADASTRAR COMBINADO</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmCombinado">
						<div>
                            <!-- PRODUTO -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
                                    <label>PRODUTO<span class="required">*</span></label>
                                    <select class="form-control descricao input-sm" id="produtoSelect" name="produtoSelect">
                                    <option value="">SELECIONE UM PRODUTO</option>
                                    <!-- PHP -->
                                    <?php
                                    $sql = "SELECT id_produto, descricao FROM produtos ORDER BY id_produto DESC";
                                    $result = mysqli_query($conexao, $sql);
                                    while ($produto = mysqli_fetch_row($result)) :
                                    ?>
                                        <option value="<?php echo $produto[0] ?>"><?php echo $produto[1] ?></option>
                                    <?php endwhile; ?>
                                </select>
								</div>
							</div>
							<!-- DESCRIÇÃO -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
                                <hr>
								<div>
									<label>DESCRIÇÃO</label>
									<input type="text" readonly class="form-control descricao input-sm text-uppercase" id="descricao" name="descricao" maxlenght="100">
								</div>
							</div>
                            <!-- NÚMERO DE PEÇAS -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                <div>
                                    <label>NÚMERO DE PEÇAS<span class="required">*</span></label>
                                    <input type="number" class="form-control quantidade_pecas input-sm estoque text-uppercase" id="quantidade_pecas" name="quantidade_pecas" maxlenght="100">
                                </div>
                            </div>
                            <!-- VALOR TOTAL -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                <div>
                                    <label>VALOR TOTAL<span class="required">*</span></label>
                                    <input type="number" class="form-control input-sm text-uppercase" id="valor_total" name="valor_total" maxlenght="100">
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
        $('#produtoSelect').select2();
        $(".descricao").change(function(){
			var produto = frmCombinado.produtoSelect.value;
            var quantidade_pecas = frmCombinado.quantidade_pecas.value;
            $.ajax({
			    type: "POST",
				data: "idProduto=" + produto,
				url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
				success:function(r){
                    dados = jQuery.parseJSON(r);
					$("#descricao").val(quantidade_pecas + " PEÇAS - " + dados.descricao);
				}
			});
		});
        $(".quantidade_pecas").change(function(){
            var produto = frmCombinado.produtoSelect.value;
			var quantidade_pecas = frmCombinado.quantidade_pecas.value;
            $.ajax({
			    type: "POST",
				data: "idProduto=" + produto,
				url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
				success:function(r){
                    dados = jQuery.parseJSON(r);
					$("#descricao").val(quantidade_pecas + " PEÇAS - " + dados.descricao);
				}
			});
		});
	});

    $('#btnCadastrar').click(function() {
        var produto = frmCombinado.produtoSelect.value;
        var quantidade_pecas = frmCombinado.quantidade_pecas.value;
        var valor_total = frmCombinado.valor_total.value;
        
        if ((produto == "") || (quantidade_pecas == "") || (valor_total == "")) {
			alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
			return false;
		}
                
        dados = $('#frmCombinado').serialize();
        
        $.ajax({
			type: "POST",
			data: dados,
			url: "./Procedimentos/Combinados/CadastrarCombinado.php",
			success: function(r) {
                if (r == 1) {
                	$('#frmCombinado')[0].reset();
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