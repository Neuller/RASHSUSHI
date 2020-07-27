<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
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
                    <h3><strong>CADASTRAR PRODUTOS</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO DE CADASTRO -->
            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmProdutos">
                        <div>
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
                                    <input type="text" class="form-control input-sm codigo text-uppercase" id="codigo" name="codigo" maxlenght="10">
                                </div>
                            </div>
                            <!-- CATEGORIA -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                <div>
                                    <label>CATEGORIA<span class="required">*</span></label>
                                    <select class="form-control input-sm" id="categoria" name="categoria">
                                        <option value="">SELECIONE UMA CATEGORIA</option>
                                        <option value="1">HARD DISK</option>
                                        <option value="2">MEMORIA</option>
                                        <option value="3">PLACA DE VIDEO</option>
                                        <option value="4">PLACA MAE</option>
                                        <option value="5">PROCESSADOR</option>
                                        <option value="6">GABINETE</option>
                                        <option value="7">MONITOR</option>
                                        <option value="8">IMPRESSORA</option>
                                        <option value="9">OUTROS</option>
                                    </select>
                                </div>
                            </div>
                            <!-- DESCRIÇÃO -->
                            <div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
                                <div>
                                    <label>DESCRIÇÃO<span class="required">*</span></label>
                                    <textarea type="text" class="form-control input-sm text-uppercase" id="descricao" name="descricao" maxlength="100" rows="3" style="resize: none"></textarea>
                                </div>
                            </div>
                            <!-- GARANTIA -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                <div>
                                    <label>GARANTIA</label>
                                    <select class="form-control input-sm" id="garantia" name="garantia">
                                        <option value="">SELECIONE UM PRAZO DE GARANTIA</option>
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
                                    <input type="number" class="form-control input-sm estoque text-uppercase" id="estoque" name="estoque" maxlenght="10">
                                </div>
                            </div>
                            <!-- VALOR UNIDADE -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                <div>
                                    <label>VALOR UNIDADE<span class="required">*</span></label>
                                    <input type="number" class="form-control input-sm text-uppercase" id="preco" name="preco" maxlenght="10">
                                </div>
                            </div>
                            <!-- VALOR INSTALADO -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                <div>
                                    <label>VALOR INSTALADO</label>
                                    <input type="number" class="form-control input-sm text-uppercase" id="precoInstalacao" name="precoInstalacao" maxlenght="10">
                                </div>
                            </div>                           
                            <!-- NF -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                <div>
                                    <label>NF</label>
                                    <input type="text" class="form-control nf input-sm text-uppercase" id="nf" name="nf" maxlenght="10">
                                </div>
                            </div>
                            <!-- NCM -->
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                <div>
                                    <label>NCM</label>
                                    <input type="text" class="form-control ncm input-sm text-uppercase" id="ncm" name="ncm" maxlenght="10">
                                </div>
                            </div>               
                            <!-- BOTÂO CADASTRAR -->
                            <div class="btnCadastrar">
                                <span class="btn btn-primary" id="btnAdicionar" title="CADASTRAR">CADASTRAR</span>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>

    <!-- SCRIPT -->
    <script type="text/javascript">
        // CADASTRAR
        $(document).ready(function() {
            $('.codigo').mask('9999999999');
            $('.estoque').mask('9999999999');
            $('.nf').mask('9999999999');
            $('.ncm').mask('9999999999');

            $('#btnAdicionar').click(function() {
                // VALIDAR CAMPOS
                var descricao = frmProdutos.descricao.value;
                var preco = frmProdutos.preco.value;
                var categoria = frmProdutos.categoria.value;
                var estoque = frmProdutos.estoque.value;

                if ((descricao == "") || (preco == "") || (categoria == "") || (estoque == "")){
                    alertify.alert("ATENÇÃO", "Preencha todos os campos obrigatórios.");
                    return false;
                }          

                dados = $('#frmProdutos').serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Produtos/AdicionarProdutos.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#frmProdutos')[0].reset();
                            alertify.success("CADASTRO REALIZADO");
                        } else {
                            alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
                        }
                    }
                });
            });
        });
    </script>

    <style>
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