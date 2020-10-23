<link rel="stylesheet" type="text/css" href="./Css/Formularios.css">
<div class="container">
	<div class="cabecalho bgGradient">
		<div class="text-center textCabecalho_White opacidade">
			<h3><strong>VISUALIZAR PRODUTO</strong></h3>
		</div>
	</div>

	<div id="visualizarProduto" tabindex="-1" role="dialog" aria-labelledby="modalVisualizar">
		<div class="modal-dialog modal-lg" role="document" data-keyboard="true">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="modal-content col-md-12 col-sm-12 col-xs-12">
					<div class="modal-header">
						<button type="button" id="btnClose" class="close" data-dismiss="modal" aria-label="Close" title="FECHAR"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form id="frmProdutoV">
								<!-- ID PRODUTO -->
								<div>
									<input type="text" hidden="" id="idProdutoV" name="idProdutoV">
								</div>
								<!-- DESCRIÇÃO -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
                                    <label>DESCRIÇÃO</label>
									<input readonly type="text" class="form-control input-sm text-uppercase" id="descricaoV" name="descricaoV" maxlenght="100">
								</div>
							</div>
							<!-- CATEGORIA -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>CATEGORIA</label>
                                    <input readonly type="text" class="form-control input-sm text-uppercase" id="categoriaV" name="categoriaV" maxlenght="100">
                                </div>
                            </div>
                            <!-- QUANTIDADE -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>QUANTIDADE</label>
                                    <input readonly type="number" class="form-control input-sm estoque text-uppercase" id="quantidadeV" name="quantidadeV" maxlenght="100">
                                </div>
                            </div>
                            <!-- VALOR UNIDADE -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
                                <div>
                                    <label>VALOR UNITÁRIO</label>
                                    <input readonly type="number" class="form-control input-sm text-uppercase" id="valor_unidadeV" name="valor_unidadeV" maxlenght="100">
                                </div>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#btnClose').click(function() {
		$('#conteudo').load("./Views/Produtos/ProcurarProduto.php");	
	});
</script>

<style>
	.cabecalho {
		margin-bottom: 50px;
	}
</style>
