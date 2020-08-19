<?php
session_start();
if (isset($_SESSION['User'])) {
?>

    <head>
        <?php require_once "../../Classes/Conexao.php";
        $c = new conectar();
        $conexao = $c->conexao();
        ?>
    </head>

    <div class="divFormulario">
        <form id="frmCadastarVenda">
            <!-- CLIENTE -->
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class="text-left">
                    <h4><strong>DADOS DO CLIENTE</strong> <span class="glyphicon glyphicon-user ml-15"></span></h4>
                </div>
                <hr>
            </div>

            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                <div>
                    <label>CLIENTE<span class="required">*</span></label>
                    <select class="form-control input-sm" id="clienteSelect" name="clienteSelect">
                        <option value="0">SELECIONE UM CLIENTE</option>
                        <?php
                        $sql = "SELECT ID_Cliente, Nome FROM clientes ORDER BY ID_CLIENTE DESC";
                        $result = mysqli_query($conexao, $sql);
                        while ($cliente = mysqli_fetch_row($result)) :
                        ?>
                            <option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <!-- INFORMAÇÕES DO(S) PRODUTO(S) -->
            <div class='col-md-12 col-sm-12 col-xs-12 separador'>
                <div class="text-left">
                    <h4><strong>INFORMAÇÕES DO(S) PRODUTO(S)</strong><span class="glyphicon glyphicon-hdd ml-15"></span></h4>
                </div>
                <hr>
            </div>
            <!-- DESCRIÇÃO -->
            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                <div>
                    <label>DESCRIÇÃO<span class="required">*</span></label>
                    <select class="form-control input-sm" id="produtoSelect" name="produtoSelect">
                        <option value="0">SELECIONE UM PRODUTO</option>
                        <?php
                        $sql = "SELECT ID_Produto, Descricao FROM produtosnserv ORDER BY ID_Produto DESC";
                        $result = mysqli_query($conexao, $sql);
                        while ($produto = mysqli_fetch_row($result)) :
                        ?>
                            <option value="<?php echo $produto[0] ?>"><?php echo $produto[1] ?></option>
                        <?php endwhile; ?>
                    </select>
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
            <!-- QUANTIDADE -->
            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                <div>
                    <label>QUANTIDADE<span class="required">*</span></label>
                    <input type="number" class="form-control input-sm estoque text-uppercase quantidade" id="quantidade" name="quantidade" maxlenght="10">
                </div>
            </div>
            <!-- BOTÃO CADASTRAR E LIMPAR -->
            <div class="btnGroup">
                <span class="btn btn-success" id="btnAdicionar" title="ADICIONAR ITEM">ADICIONAR ITEM<span class="fas fa-shopping-cart ml-15"></span></span>
                <!-- <span class="btn btn-warning" id="btnLimpar" title="Limpar">LIMPAR</span> -->
            </div>
        </form>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#clienteSelect').select2();
            $('#produtoSelect').select2();

            $('#produtoSelect').change(function() {
                $.ajax({
                    type: "POST",
                    data: "idProduto=" + $('#produtoSelect').val(),
                    url: "./Procedimentos/Vendas/ObterDadosProdutos.php",
                    success: function(r) {
                        dado = jQuery.parseJSON(r);
                        $('#estoqueView').val(dado['Estoque']);
                        $('#precoView').val(dado['Preco']);
                    }
                });
            });

            $('#btnAdicionar').click(function() {

                var produto = $("#produtoSelect").val();
                var quantidade = $("#quantidade").val();
                var cliente = $("#clienteSelect").val();

                if ((cliente == "0") || (produto == "0") || (quantidade == "")) {
                    alertify.error("PREENCHA OS CAMPOS OBRIGATÓRIOS");
                    return false;
                }

                quantidade = 0;
                quantidadeEstoque = 0;

                quantidade = parseInt($('#quantidade').val());
                quantidadeEstoque = parseInt($('#estoqueView').val());

                if ((quantidade > quantidadeEstoque) || (quantidade == 0)) {
                    alertify.alert("ATENÇÃO", "QUANTIDADE INDISPONÍVEL EM ESTOQUE");
                    quantidade = $('#quantidade').val("");
                    return false;
                } else {
                    quantidadeEstoque = parseInt($('#estoqueView').val());
                }

                dados = $('#frmCadastarVenda').serialize();

                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Vendas/AdicionarProdutoTabelaTemporaria.php",
                    success: function(r) {
                        $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
                        $("#produtoSelect").val("0").change();
                        $("#estoqueView").val("");
                        $("#precoView").val("");
                        $("#quantidade").val("");
                        alertify.success("ITEM ADICIONADO");
                    }
                });
            });

            $('#btnLimpar').click(function() {
                $.ajax({
                    url: "../../Procedimentos/Vendas/LimparTabelaVendasTemporaria.php",
                    success: function(r) {
                        $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
                    }
                });
            });

        });
    </script>
<?php
} else {
    header("location: ./index.php");
}
?>