<?php
require_once "../../Classes/Conexao.php";
$c = new conectar();
$conexao = $c -> conexao();
?>
<link rel="stylesheet" type="text/css" href="./Css/Formularios.css">
<div class="container">
	<div class="cabecalho bgGradient">
		<div class="text-center textCabecalho_White opacidade">
			<h3><strong>EDITAR PRODUTO</strong></h3>
		</div>
	</div>

	<div id="editarProduto" tabindex="-1" role="dialog" aria-labelledby="modalEditar">
		<div class="modal-dialog modal-lg" role="document" data-keyboard="true">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="modal-content col-md-12 col-sm-12 col-xs-12">
					<div class="modal-header">
						<button type="button" id="btnClose" class="close" data-dismiss="modal" aria-label="Close" title="FECHAR"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form id="frmProdutoU">
							<!-- ID PRODUTO -->
							<div>
								<input type="text" hidden="" id="idProdutoU" name="idProdutoU">
							</div>
							<!-- DESCRIÇÃO -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
                                    <label>DESCRIÇÃO<span class="required">*</span></label>
									<input type="text" class="form-control input-sm text-uppercase" id="descricaoU" name="descricaoU" maxlenght="100">
								</div>
							</div>
							<!-- CATEGORIA -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>CATEGORIA<span class="required">*</span></label>
                                    <select class="form-control input-sm" id="categoriaSelectU" name="categoriaSelectU">
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
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>QUANTIDADE</label>
                                    <input type="number" class="form-control input-sm estoque text-uppercase" id="quantidadeU" name="quantidadeU" maxlenght="100">
                                </div>
                            </div>
                            <!-- VALOR UNIDADE -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR UNITÁRIO<span class="required">*</span></label>
                                    <input type="number" class="form-control input-sm text-uppercase" id="valor_unidadeU" name="valor_unidadeU" maxlenght="100">
                                </div>
                            </div>
							<!-- BOTÃO EDITAR -->
							<div class="btnEditar">
								<span class="btn btn-warning" id="btnEditar" title="EDITAR" data-dismiss="modal">EDITAR</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function($) {
	});

	$('#btnEditar').click(function() {
		var descricao = $("#descricaoU").val();
		var categoria = $("#categoriaSelectU").val();
		var valorUnidade = $("#valor_unidadeU").val();

		if ((descricao == "") || (categoria == "") || (categoria == 0) || (valorUnidade == "") || (valorUnidade == 0)) {
			alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
			return false;
		}

        dados = $('#frmProdutoU').serialize();

		$.ajax({
			type: 'POST',
			data: dados,
            url: "./Procedimentos/Produtos/EditarProduto.php",
	        success: function(r) {
				if (r == 1) {
    				$('#conteudo').load("./Views/Produtos/ProcurarProduto.php");
					alertify.success("REGISTRO ATUALIZADO");
				} else {
					alertify.error("NÃO FOI POSSÍVEL ATUALIZAR");
				}
			}
		});
	}); 

	$('#btnClose').click(function() {
		$('#conteudo').load("./Views/Produtos/ProcurarProduto.php");	
	});
</script>
<style>
	.cabecalho {
		margin-bottom: 50px !important;
	}
</style>
