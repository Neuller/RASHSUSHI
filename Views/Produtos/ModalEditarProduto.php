<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>
<!-- MODAL EDIÇÃO -->
<div class="modal fade" id="editarProduto" tabindex="-1" role="dialog" aria-labelledby="modalEditar">
            <div class="modal-dialog modal-lg" role="document" data-keyboard="true">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="modal-content col-md-12 col-sm-12 col-xs-12">
                        <!-- TÍTULO -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">EDITAR</h4>
                        </div>
                        <!-- FORMULÁRIO -->
                        <div class="modal-body">
                            <form id="frmProduto">
                                <!-- ID PRODUTO -->
                                <div>
                                    <input type="text" hidden="" id="idProduto" name="idProduto">
                                </div>
                                <!-- ID GATEGORIA -->
                                <div>
                                    <input type="text" hidden="" id="idCategoria" name="idCategoria">
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
                                        <input type="text" class="form-control input-sm codigo text-uppercase" id="codigoU" name="codigoU" maxlenght="10">
                                    </div>
                                </div>
                                <!-- DESCRIÇÃO -->
                                <div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
                                    <div>
                                        <label>DESCRIÇÃO<span class="required">*</span></label>
                                        <textarea type="text" class="form-control input-sm text-uppercase" id="descricaoU" name="descricaoU" maxlength="100" rows="3" style="resize: none"></textarea>
                                    </div>
                                </div>
                                <!-- GARANTIA -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>GARANTIA</label>
                                        <select class="form-control input-sm" id="garantiaU" name="garantiaU">
                                            <option value=""></option>
                                            <option value="FUNCIONAL">FUNCIONAL</option>
                                            <option value="30 DIAS">30 DIAS</option>
                                            <option value="90 DIAS">90 DIAS</option>
                                            <option value="06 MESES">06 MESES</option>
                                            <option value="12 MESES">12 MESES</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- ESTOQUE -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>ESTOQUE<span class="required">*</span></label>
                                        <input type="text" class="form-control input-sm estoque text-uppercase" id="estoqueU" name="estoqueU" maxlenght="10">
                                    </div>
                                </div>
                                <!-- VALOR UNIDADE -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>VALOR UNIDADE<span class="required">*</span></label>
                                        <input type="text" class="form-control input-sm text-uppercase" id="precoU" name="precoU">
                                    </div>
                                </div>
                                <!-- VALOR INSTALADO -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>VALOR INSTALADO</label>
                                        <input type="text" class="form-control input-sm text-uppercase" id="precoInstalacaoU" name="precoInstalacaoU" maxlenght="10">
                                    </div>
                                </div>
                                <!-- NF -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>NF</label>
                                        <input type="text" class="form-control nf input-sm text-uppercase" id="nfU" name="nfU" maxlenght="10">
                                    </div>
                                </div>
                                <!-- NCM -->
                                <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                    <div>
                                        <label>NCM</label>
                                        <input type="text" class="form-control ncm input-sm text-uppercase" id="ncmU" name="ncmU" maxlenght="10">
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
<script type="text/javascript">
	$(document).ready(function() {

	});
    $('#btnEditar').click(function() {
                var descricao = frmProduto.descricaoU.value;
                var preco = frmProduto.precoU.value;
                var estoque = frmProduto.estoqueU.value;

                if ((descricao == "") || (preco == "") || (estoque == "")) {
                    alertify.alert("ATENÇÃO", "PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS.");
                    return false;
                }

                dados = $('#frmProduto').serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Produtos/EditarProdutos.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tabelaHardDisk').load("./Views/Produtos/HardDisk/TabelaHD.php");
                            alertify.success("REGISTRO ATUALIZADO");
                        } else {
                            alertify.error("NÃO FOI POSSÍVEL ATUALIZAR");
                        }
                    }
                });
            });
</script>
<?php
} else {
	header("location: ./index.php");
}
?>