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
                    <h3><strong>TABELA DE PRODUTOS - PROCESSADOR</strong></h3>
                </div>
            </div>
            <!-- TABELA PROCESSADOR -->
            <div class="row">
                <div class="col-sm-12" align="center">
                    <div id="tabelaProcessador"></div>
                </div>
            </div>
            <!-- BTN NOVO CADASTRO -->
			<div class="btnLeft">
				<span class="btn btn-success" id="btnNovoCadastro" title="NOVO CADASTRO">NOVO CADASTRO</span>
			</div>
        </div>

        <!-- MODAL EDITAR PRODUTO -->
		<div id="modalEditarProduto"></div>

        <!-- MODAL VISUALIZAR PRODUTO -->
        <div id="modalVisualizarProduto"></div>
   </body> 
</html>

    <!-- SCRIPT -->
    <script type="text/javascript">
        // CARREGAR TABELA
        $(document).ready(function() {
            $('#tabelaProcessador').load('./Views/Produtos/Processador/TabelaProcessador.php');
            $('#modalEditarProduto').load('./Views/Produtos/ModalEditarProduto.php');
            $('#modalVisualizarProduto').load('./Views/Produtos/ModalVisualizarProduto.php');

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
                            $('#tabelaProcessador').load('./Views/Produtos/Processador/TabelaProcessador.php');
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