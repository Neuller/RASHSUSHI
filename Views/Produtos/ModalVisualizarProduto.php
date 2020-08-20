<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>
	<!-- MODAL VISUALIZAR -->
	<div class="modal fade" id="visualizarProduto" tabindex="-1" role="dialog" aria-labelledby="modalVisualizar">
            <div class="modal-dialog modal-lg" role="document" data-keyboard="true">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="modal-content col-md-12 col-sm-12 col-xs-12">
                        <!-- TÍTULO -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">VISUALIZAR</h4>
                        </div>
                        <!-- FORMULÁRIO -->
                        <div class="modal-body">
                            <form id="frmVisualizarProduto">
                                <!-- ID PRODUTO -->
                                <div>
                                    <input type="text" hidden="" id="idProdutoView" name="idProdutoView">
                                </div>
                                <!-- ID GATEGORIA -->
                                <div>
                                    <input type="text" hidden="" id="idCategoriaView" name="idCategoriaView">
                                </div>
                                <!-- FORMULÁRIO DADOS DO PRODUTO -->
                                <div class='col-md-12 col-sm-12 col-xs-12'>
                                    <div class="text-left">
                                        <h4><strong>DADOS DO PRODUTO</strong><span class="glyphicon glyphicon-hdd ml-15"></span></h4>
                                    </div>
                                    <hr>
                                </div>
                                <!-- CÓDIGO -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>CÓDIGO</label>
                                        <input type="text" readonly class="form-control input-sm codigo text-uppercase" id="codigoView" name="codigoView">
                                    </div>
                                </div>
                                <!-- DESCRIÇÃO -->
                                <div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
                                    <div>
                                        <label>DESCRIÇÃO</label>
                                        <textarea type="text" readonly class="form-control input-sm text-uppercase" id="descricaoView" name="descricaoView" rows="3" style="resize: none"></textarea>
                                    </div>
                                </div>
                                <!-- GARANTIA -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>GARANTIA</label>
                                        <input type="text" readonly class="form-control input-sm codigo text-uppercase" id="garantiaView" name="garantiaView">
                                    </div>
                                </div>
                                <!-- ESTOQUE -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>ESTOQUE</label>
                                        <input type="text" readonly class="form-control input-sm estoque text-uppercase" id="estoqueView" name="estoqueView">
                                    </div>
                                </div>
                                <!-- VALOR UNIDADE -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>VALOR UNIDADE</label>
                                        <input type="text" readonly class="form-control input-sm text-uppercase" id="precoView" name="precoView">
                                    </div>
                                </div>
                                <!-- VALOR INSTALADO -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>VALOR INSTALADO</label>
                                        <input type="text" readonly class="form-control input-sm text-uppercase" id="precoInstalacaoView" name="precoInstalacaoView">
                                    </div>
                                </div>
                                <!-- NF -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>NF</label>
                                        <input type="text" readonly class="form-control nf input-sm text-uppercase" id="nfView" name="nfView">
                                    </div>
                                </div>
                                <!-- NCM -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>NCM</label>
                                        <input type="text" readonly class="form-control ncm input-sm text-uppercase" id="ncmView" name="ncmView">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
} else {
	header("location:../../index.php");
}
?>