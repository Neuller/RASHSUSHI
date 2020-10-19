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
					<h3><strong>CADASTRAR PEDIDO</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmPedido">
						<!-- DADOS DO CLIENTE -->
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class="text-left">
                                <h4><strong>DADOS DO CLIENTE</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <!-- CLIENTE -->
                        <div class="mb-20px col-md-8 col-sm-8 col-xs-8 itensFormularioCadastro">
                            <div>
                                <label>CLIENTE<span class="required">*</span></label>
                                <select class="form-control input-sm" id="clienteSelect" name="clienteSelect">
                                    <option value="">SELECIONE UM CLIENTE</option>
                                    <?php
                                    $sql = "SELECT id_cliente, nome FROM clientes ORDER BY id_cliente DESC";
                                    $result = mysqli_query($conexao, $sql);

                                    while ($cliente = mysqli_fetch_row($result)) :
                                    ?>
                                        <option value="<?php echo $cliente[0] ?>"><?php echo $cliente[1] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <!-- ADICIONAR CLIENTE -->
                        <div>
                            <span class="btn btn-success glyphicon glyphicon-plus ml-15" id="btnAddCliente"></span>
                        </div>
                        <!-- DADOS DO PEDIDO -->
                        <div class='col-xs-12 col-md-12 col-sm-12 separador'>
                            <div class="text-left">
                                <h4><strong>DADOS DO PEDIDO</strong><span class="glyphicon glyphicon-shopping-cart ml-15"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <!-- DESCRIÇÃO DO PRODUTO -->
                        <div class="mb-20px col-xs-8 col-md-8 col-sm-8 itensFormularioCadastro">
                            <div>
                                <label>PRODUTO<span class="required">*</span></label>
                                <select class="form-control input-sm" id="produtoSelect" name="produtoSelect">
                                    <option value="">SELECIONE UM PRODUTO</option>
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
                        <!-- VALOR UNITÁRIO -->
                        <div class="mb-20px col-xs-4 col-md-4 col-sm-4 itensFormularioCadastro">
                            <div>
                                <label>VALOR UNITÁRIO</label>
                                <input readonly type="text" class="form-control input-sm text-uppercase" id="valor_unidade" name="valor_unidade" maxlenght="100">
                            </div>
                        </div>
                        <!-- MEDIDA -->
                        <div class="mb-20px col-xs-8 col-md-8 col-sm-8 itensFormularioCadastro">
                            <div>
                                <label>MEDIDA<span class="required">*</span></label>
                                <select class="form-control input-sm" id="medidaSelect" name="medidaSelect">
                                    <option value="">SELECIONE UMA OPÇÃO DE MEDIDA</option>
                                </select>
                            </div>
                        </div>
                        <!-- QUANTIDADE -->
                        <div class="mb-20px col-xs-4 col-md-4 col-sm-4 itensFormularioCadastro">
                            <div>
                                <label>QUANTIDADE<span class="required">*</span></label>
                                <input type="number" class="form-control input-sm text-uppercase quantidade" id="quantidade" name="quantidade" maxlenght="100">
                            </div>
                        </div>
						
					</form>
				</div>
            </div>
            <!-- BOTÂO ADICIONAR/LIMPAR -->
			<div class="btnAdicionar">
                <span class="btn btn-success" id="btnAdicionar" title="ADICIONAR">ADICIONAR</span>
                <span class="btn btn-warning" id="btnLimpar" title="LIMPAR">LIMPAR</span>
			</div>
            <!-- CARRINHO -->
            <div class="col-sm-12" align="center">
                <div id="carrinho_compras"></div>
            </div>
            <!-- BOTÂO CADASTRAR -->
			<div class="btnCadastrar">
				<span class="btn btn-primary" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">
	$(document).ready(function($) {
        $('#clienteSelect').select2();
        $('#produtoSelect').select2();
        $('#medidaSelect').select2();
        $('#carrinho_compras').load('./Views/Pedidos/CarrinhoCompras.php');
        $("#medidaSelect").prop('disabled', true);

        $("#produtoSelect").change(function(){
            $("#medidaSelect").prop('disabled', false);
			var produto = $("#produtoSelect").val();
            $.ajax({
			    type: "POST",
				data: "idProduto=" + produto,
				url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
				success:function(r){
                    dados = jQuery.parseJSON(r);
                    var valor_unidade = dados.valor_unidade;
                    $.ajax({
                        type: "POST",
                        data: "idProduto=" + produto,
                        url: "./Procedimentos/Combinados/ObterCombinados.php",
                        success:function(r){
                            dados = jQuery.parseJSON(r);
                            $("#medidaSelect").empty();
                            $('#medidaSelect').append($('<option>', {
                                value: "",
                                text: "SELECIONE UMA OPÇÃO DE MEDIDA"
                            }));
                            $('#medidaSelect').append($('<option>', {
                                value: valor_unidade,
                                text: "UNIDADE"
                            }));
                            for (i = 0; i <= dados.length; i++) {
                                const document = dados[i];
                                $('#medidaSelect').append($('<option>', {
                                    value: document?.valor_total,
                                    text: document?.descricao
                                }));
                            }
                        }
                    });
				}
			});
        });
        
        $("#medidaSelect").change(function(){
			var valor_unidade = $("#medidaSelect").val();
            $("#valor_unidade").val(valor_unidade);
		});
	});

    $('#btnAdicionar').click(function() {
    var produto = $("#produtoSelect").val();
    var quantidade = $("#quantidade").val();
    var medida = $("#medidaSelect").val();

    if (produto == "") {
        alertify.error("SELECIONE UM PRODUTO");
        return false;
    }
    if (medida == "") {
        alertify.error("SELECIONE UMA MEDIDA");
        return false;
    }
    if (quantidade == "") {
        alertify.error("SELECIONE UMA QUANTIDADE");
        return false;
    }

    dados = $('#frmPedido').serialize();

    $.ajax({
        type: "POST",
        data: dados,
        url: "./Procedimentos/Pedidos/AdicionarAoCarrinho.php",
        success: function(r) {
            $('#carrinho_compras').load('./Views/Pedidos/CarrinhoCompras.php');
            $("#produtoSelect").val("").change();
            $("#valor_unidade").val("");
            $("#quantidade").val("");
            alertify.success("ITEM ADICIONADO");
        }
    });
    });

    $('#btnCadastrar').click(function() {
		var cliente = $("#clienteSelect").val();
        
        if (cliente == "") {
			alertify.error("SELECIONE UM CLIENTE");
			return false;
		}
        
        $.ajax({
            url: "./Procedimentos/Pedidos/CadastrarPedido.php",
            success: function(r) {
                if (r > 0) {
                    $('#carrinho_compras').load('./Views/Pedidos/CarrinhoCompras.php');
                    $("#clienteSelect").val("").change();
                    $('#frmPedido')[0].reset();
                    alertify.success("CADASTRO REALIZADO");
                } else if (r == 0) {
                    alertify.alert("ATENÇÃO", "O CARRINHO ESTÁ VAZIO.");
                } else {
                    alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
                }
            }
        });
    });

    $('#btnLimpar').click(function() {
        $.ajax({
            url: "./Procedimentos/Pedidos/LimparCarrinho.php",
            success: function(r) {
                $('#carrinho_compras').load('./Views/Pedidos/CarrinhoCompras.php');
            }
        });
    });

    $('#btnAddCliente').click(function() {
        $('#conteudo').load("./Views/Clientes/CadastrarClientes.php");	
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