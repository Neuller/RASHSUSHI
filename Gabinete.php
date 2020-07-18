<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>

    <!DOCTYPE html>
    <html>
    <!-- MENU -->

    <head>
        <?php require_once "./Classes/Conexao.php"; ?>
        <?php require_once "./Menu.php"; ?>
    </head>

    <body>
        <div class="tblPlacaVideo container">
            <!-- CABEÇALHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>TABELA DE PRODUTOS - GABINETE</strong></h3>
                </div>
            </div>
            <!-- TABELA GABINETES -->
            <div class="row">
                <div class="col-sm-12" align="center">
                    <div id="tabelaGabinete"></div>
                </div>
            </div>
            <!-- BTN NOVO CADASTRO -->
			<div class="btnLeft">
				<span class="btn btn-success" id="btnNovoCadastro">NOVO CADASTRO</span>
			</div>
        </div>
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
                                        <label>ESTOQUE</label>
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
                                    <span class="btn btn-warning" id="btnEditar" title="Editar" data-dismiss="modal">EDITAR</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </body>

    </html>

    <!-- SCRIPT -->
    <script type="text/javascript">
        // CARREGAR TABELA
        $(document).ready(function() {
            $('#tabelaGabinete').load('./Views/Produtos/Gabinete/TabelaGabinete.php');
            $('#btnEditar').click(function() {
                // VALIDAR CAMPOS
                var descricao = frmProduto.descricaoU.value;
                var preco = frmProduto.precoU.value;

                if (descricao == "" || preco == "") {
                    alertify.error("Preencha o(s) campo(s) obrigatório(s)");
                    return false;
                }

                dados = $('#frmProduto').serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Produtos/EditarProdutos.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tabelaGabinete').load('./Views/Produtos/Gabinete/TabelaGabinete.php');
                            alertify.success("Registro atualizado com sucesso");
                        } else {
                            alertify.error("Não foi possível atualizar");
                        }
                    }
                });
            });

            $('#btnNovoCadastro').click(function() {
				window.location.href = "http://localhost/NservPortal/CadastrarProdutos.php";
			});
        });
        // PREENCHER MODAL DE EDIÇÂO
        function adicionarDados(idProduto) {
            $.ajax({
                type: "POST",
                data: "idProduto=" + idProduto,
                url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
                success: function(r) {
                    dado = jQuery.parseJSON(r);
                    $('#idProduto').val(dado['ID_Produto']);
                    $('#idCategoria').val(dado['ID_Categoria']);
                    $('#codigoU').val(dado['Codigo']);
                    $('#descricaoU').val(dado['Descricao']);
                    $('#garantiaU').val(dado['Garantia']);
                    $('#precoU').val(dado['Preco']);
                    $('#precoInstalacaoU').val(dado['PrecoInstalacao']);
                    $('#estoqueU').val(dado['Estoque']);
                    $('#nfU').val(dado['NF']);
                    $('#ncmU').val(dado['NCM']);
                }
            });
        }
        // VISUALIZAR DADOS DE PRODUTO
        function visualizarDados(idProduto) {
            $.ajax({
                type: "POST",
                data: "idProduto=" + idProduto,
                url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
                success: function(r) {
                    dado = jQuery.parseJSON(r);
                    $('#idProdutoView').val(dado['ID_Produto']);
                    $('#idCategoriaView').val(dado['ID_Categoria']);
                    $('#codigoView').val(dado['Codigo']);
                    $('#descricaoView').val(dado['Descricao']);
                    $('#garantiaView').val(dado['Garantia']);
                    $('#estoqueView').val(dado['Estoque']);
                    $('#precoView').val(dado['Preco']);
                    $('#precoInstalacaoView').val(dado['PrecoInstalacao']);
                    $('#nfView').val(dado['NF']);
                    $('#ncmView').val(dado['NCM']);
                }
            });
        }
        // EXCLUIR PRODUTO
        function excluirProduto(idProduto) {
            alertify.confirm('ATENÇÃO', 'Realmente deseja excluir?', function() {
                $.ajax({
                    type: "POST",
                    data: "idProduto=" + idProduto,
                    url: "./Procedimentos/Produtos/ExcluirProduto.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#tabelaGabinete').load('./Views/Produtos/Gabinete/TabelaGabinete.php');
                            alertify.success("Registro excluído com sucesso");
                        } else {
                            alertify.error("Não foi possível excluir");
                        }
                    }
                });
            }, function() {
                alertify.error('Cancelado')
            });
        }
    </script>

    <style>
        .mb-20px {
            margin-bottom: 20px;
        }

        .mb-15px {
            margin-bottom: 15px;
        }

        .cabecalho {
            margin-bottom: 50px;
        }
    </style>

    <!-- SE NÂO ESTIVAR LOGADO RETORNA À PÁGINA INICIAL -->
<?php
} else {
    header("location:./index.php");
}
?>