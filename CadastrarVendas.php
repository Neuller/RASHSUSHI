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
        <?php require_once "./Classes/Conexao.php";
        $c = new conectar();
        $conexao = $c->conexao();
        ?>
    </head>

    <body>
        <div class="container">
            <!-- CABEÇALHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>CADASTRAR VENDAS</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO CADASTRO DE VENDAS -->
            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmVenda">
                        <!-- CLIENTE -->
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class="text-left">
                                <h4><strong>DADOS DO CLIENTE</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                            <div>
                                <label>CLIENTE<span class="required">*</span></label>
                                <select class="form-control input-sm" id="clienteSelect" name="clienteSelect">
                                    <option value="">SELECIONE UM CLIENTE</option>
                                    <!-- PHP -->
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
                                    <option value="">SELECIONE UM PRODUTO</option>
                                    <!-- PHP -->
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
                                <input type="number" class="form-control input-sm estoque text-uppercase quantidadeVendida" id="quantidadeVendida" name="quantidadeVendida" maxlenght="10">
                            </div>
                        </div>
                        <!-- BOTÃO CADASTRAR E LIMPAR -->
                        <div class="btnGroup">
                            <span class="btn btn-success" id="btnAdicionar" title="Adicionar">ADICIONAR<span class="fas fa-shopping-cart ml-15"></span></span>
                            <!-- <span class="btn btn-warning" id="btnLimpar" title="Limpar">LIMPAR</span> -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- CARRINHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>CARRINHO</strong><span class="fas fa-shopping-cart ml-15"></span></h3>
                </div>
            </div>
            <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class="text-left">
                    <div>
                        <label>CLIENTE</label>
                    </div>
                    <div id="nomeCliente"></div>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-sm-12" align="center">
                    <div id="tabelaVendasTemporaria"></div>
                </div>
            </div>
    </body>

    </html>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
            $('#clienteSelect').select2();
            $('#produtoSelect').select2();
            $('.quantidadeVendida').mask('9999999999');
            // OBTER DADOS DO PRODUTO
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
            // BOTÃO ADICIONAR
            $('#btnAdicionar').click(function() {
                // VALIDAR CAMPOS VAZIOS
                var produto = frmVenda.produtoSelect.value;
                var quantidadeVendida = frmVenda.quantidadeVendida.value;
                var cliente = frmVenda.clienteSelect.value;

                if (cliente == "") {
                    alertify.alert("ATENÇÃO", "Selecione um Cliente");
                    return false;
                }
                if (produto == "") {
                    alertify.alert("ATENÇÃO", "Selecione um Produto");
                    return false;
                }
                if (quantidadeVendida == "") {
                    alertify.alert("ATENÇÃO", "Preencha o campo Quantidade");
                    return false;
                }

                // VALIDAR QUANTIDADE EM ESTOQUE            
                quantidadeEstoque = 0;
                quantidadeVendida = 0;

                quantidadeEstoque = $('#estoqueView').val();
                quantidadeVendida = $('#quantidadeVendida').val();

                if (quantidadeVendida > quantidadeEstoque) {
                    alertify.alert("ATENÇÃO", "Quantidade indisponível em estoque");
                    quantidadeVendida = $('#quantidadeVendida').val("");
                    return false;
                } else {
                    quantidadeEstoque = $('#estoqueView').val();
                }

                dados = $('#frmVenda').serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Vendas/AdicionarProdutoTbl.php",
                    success: function(r) {
                        $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
                        alertify.success("Produto adicionado no carrinho");
                        $('#frmVenda')[0].reset();
                    }
                });
            });
            // BOTÃO LIMPAR
            $('#btnLimpar').click(function() {
                $.ajax({
                    url: "./Procedimentos/Vendas/LimparTabelaVendasTemporaria.php",
                    success: function(r) {
                        $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
                    }
                });
            });
        });
        // EFETUAR VENDA
        function cadastrarVenda() {
            $.ajax({
                url: "./Procedimentos/Vendas/AdicionarVendas.php",
                success: function(r) {
                    if (r > 0) {
                        $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
                        $('#frmVenda')[0].reset();
                        alertify.success("Venda realizada com sucesso");
                    } else if (r == 0) {
                        alertify.alert("ATENÇÃO", "O carrinho está vazio");
                    } else {
                        alertify.error("Venda não realizada");
                    }
                }
            });
        }
        // REMOVER PRODUTO DO CARRINHO
        function excluir(index) {
            $.ajax({
                type: "POST",
                data: "ind=" + index,
                url: "./Procedimentos/Vendas/ExcluirProduto.php",
                success: function(r) {
                    $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
                    alertify.success("Produto removido do carrinho");
                }
            });
        }
        // ATUALIZAR ESTOQUE
        function atualizarEstoque(dados) {
            $.ajax({
                type: "POST",
                data: "dados=" + dados,
                url: "./Procedimentos/Vendas/EditarEstoque.php",
                success: function(r) {
                    $('#tabelaVendasTemporaria').load('./Views/Vendas/TabelaVendasTemporaria.php');
                    alertify.success("Estoque atualizado");                                            
                }
            });
        }
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