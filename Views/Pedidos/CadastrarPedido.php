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
                                <h4><strong>INFORMAÇÔES DO CLIENTE </strong><span class="glyphicon glyphicon-user"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <!-- CLIENTE -->
                        <div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
                            <div>
                                <label>CLIENTE<span class="required">*</span></label>
                                <select class="form-control input-sm" id="clienteSelect" name="clienteSelect">
                                    <option value="">SELECIONE UM CLIENTE</option>
                                    <?php
                                    $sql = "SELECT id_cliente, nome, celular FROM clientes ORDER BY id_cliente DESC";
                                    $result = mysqli_query($conexao, $sql);
                                    
                                    while ($cliente = mysqli_fetch_row($result)) :
                                        $celular = preg_replace("/[^0-9]/", "", $cliente[2]);
                                    ?>
                                        <option value="<?php echo $cliente[0] ?>"><?php echo $celular ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <!-- CADASTRAR CLIENTE -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario btnLeft">
                            <span class="btn btn-success glyphicon glyphicon-plus" id="btnCadastrarCliente" title="CADASTRAR CLIENTE"></span>
                        </div>

                        <!-- LOCAL DE ENTREGA -->
                        <div class='col-xs-12 col-md-12 col-sm-12 separador'>
                            <div class="text-left">
                                <h4><strong>INFORMAÇÔES DA ENTREGA </strong><span class="glyphicon glyphicon-map-marker"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <!-- ENDEREÇO -->
                        <div class="col-xs-12 col-md-12 col-sm-12 itensFormulario">
                            <div>
                                <label>ENDEREÇO<span class="required">*</span></label>
                                <input type="text" class="form-control input-sm text-uppercase" id="enderecoEntrega" name="enderecoEntrega" maxlenght="500">
                            </div>
                        </div>
                        <!-- ENTREGADOR -->
                        <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario">
                            <div>
                                <label>ENTREGADOR</label>
                                <select class="form-control input-sm" id="entregadorSelect" name="entregadorSelect">
                                    <option value="">SELECIONE UM ENTREGADOR</option>
                                    <?php
                                    $sql = "SELECT id_entregador, nome FROM entregadores ORDER BY id_entregador DESC";
                                    $result = mysqli_query($conexao, $sql);
                                    while ($entregador = mysqli_fetch_row($result)) :
                                    ?>
                                        <option value="<?php echo $entregador[0] ?>"><?php echo $entregador[1] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <!-- TAXA DO ENTREGADOR -->
                        <div id="divTaxaEntregador" class="col-xs-6 col-md-6 col-sm-6 itensFormulario">
                            <div>
                                <label>TAXA DO ENTREGADOR</label>
                                <input type="number" class="form-control input-sm text-uppercase" id="taxaEntregador" name="taxaEntregador" maxlenght="10">
                            </div>
                        </div>

                        <!-- DADOS DO PEDIDO -->
                        <div class='col-xs-12 col-md-12 col-sm-12 separador'>
                            <div class="text-left">
                                <h4><strong>INFORMAÇÕES DO PEDIDO </strong><span class="glyphicon glyphicon-shopping-cart"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <!-- PRODUTO -->
                        <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario">
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
                        <!-- MEDIDA -->
                        <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario">
                            <div>
                                <label>MEDIDA<span class="required">*</span></label>
                                <select class="form-control input-sm" id="medidaSelect" name="medidaSelect">
                                    <option value="">SELECIONE UMA MEDIDA</option>
                                </select>
                            </div>
                        </div>
                        <!-- DESCRIÇÃO DO PRODUTO -->
                        <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario">
                            <div>
                                <label>DESCRIÇÃO</label>
                                <input readonly type="text" class="form-control input-sm text-uppercase" id="descricao" name="descricao" maxlenght="500">
                            </div>
                        </div>
                        <!-- VALOR UNITÁRIO -->
                        <div class="col-xs-3 col-md-3 col-sm-3 itensFormulario">
                            <div>
                                <label>VALOR UNITÁRIO</label>
                                <input readonly type="text" class="form-control input-sm text-uppercase" id="valor_unidade" name="valor_unidade" maxlenght="100">
                            </div>
                        </div>
                        <!-- QUANTIDADE -->
                        <div class="col-xs-3 col-md-3 col-sm-3 itensFormulario">
                            <div>
                                <label>QUANTIDADE</label>
                                <input type="number" class="form-control input-sm text-uppercase quantidade" id="quantidade" name="quantidade" maxlenght="100">
                            </div>
                        </div>

                        <!-- BOTÂO ADICIONAR/LIMPAR -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario btnLeft">
                            <span class="btn btn-success" id="btnAdicionar" title="ADICIONAR">ADICIONAR</span>
                            <span class="btn btn-warning" id="btnLimpar" title="LIMPAR">LIMPAR</span>
                        </div>
                        <!-- CARRINHO -->
                        <div class="col-sm-12" align="center">
                            <div id="carrinho_compras"></div>
                        </div>

                        <!-- FORMA DE PAGAMENTO -->
                        <div class='col-xs-12 col-md-12 col-sm-12 separador'>
                            <div class="text-left">
                                <h4><strong>INFORMAÇÔES DO PAGAMENTO </strong><span class="glyphicon glyphicon-bitcoin"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <div class="col-xs-6 col-md-6 col-sm-6 itensFormulario">
                            <div>
                                <label>SELECIONE UMA FORMA DE PAGAMENTO</label>
                                <select class="form-control input-sm" id="formaPagamento" name="formaPagamento">
                                    <option value="">SELECIONE UMA FORMA DE PAGAMENTO</option>
                                    <option value="CARTAO">CARTÃO DE CREDITO/DÉBITO</option>
                                    <option value="DINHEIRO">DINHEIRO</option>
                                </select>
                            </div>
                        </div>
                        <!-- VALOR TOTAL -->
                        <div class="col-xs-2 col-md-2 col-sm-2 itensFormulario">
                            <div>
                                <label>VALOR TOTAL</label>
                                <input readonly type="number" class="form-control input-sm text-uppercase" id="valor_total" name="valor_total">
                            </div>
                        </div>
                        <!-- VALOR DO PAGAMENTO -->
                        <div class="col-xs-2 col-md-2 col-sm-2 itensFormulario">
                            <div>
                                <label>VALOR DO PAGAMENTO</label>
                                <input type="number" class="form-control input-sm text-uppercase" id="valorPagamento" name="valorPagamento" maxlenght="10">
                            </div>
                        </div>
                        <!-- TROCO -->
                        <div class="col-xs-2 col-md-2 col-sm-2 itensFormulario">
                            <div>
                                <label>TROCO</label>
                                <input readonly type="text" class="form-control input-sm text-uppercase" id="troco" name="troco" maxlenght="100">
                            </div>
                        </div>
                        <!-- BOTÂO CADASTRAR -->
                        <div class="col-md-12 col-sm-12 col-xs-12 itensFormulario btnLeft">
                            <span class="btn btn-primary" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
                        </div>
					</form>
				</div>
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
        $("#divTaxaEntregador").hide();

        $("#clienteSelect").change(function(){
            const cliente = $("#clienteSelect").val();
            $.ajax({
                type: "POST",
                data: "idCliente=" + cliente,
                url: "./Procedimentos/Clientes/ObterDadosCliente.php",
                success:function(r){
                    dados = jQuery.parseJSON(r);
                    var endereco = (dados.endereco == null) ? "" : dados.endereco;
                    var numero = (dados.numero == null) ? "" : dados.numero;
                    var bairro = (dados.bairro == null) ? "" : dados.bairro;
                    var enderecoEntrega = "";

                    enderecoEntrega = (endereco == "") ? "" : endereco + " ";
                    numeroEntrega = (numero == "") ? "" : numero + " ";
                    bairroEntrega = (bairro == "") ? "" : bairro;
                    enderecoEntregaCompleto = enderecoEntrega + numeroEntrega + bairroEntrega;
                    $("#enderecoEntrega").val(enderecoEntregaCompleto);
                }
		    });
        });

        $("#entregadorSelect").change(function(){
            var entregador = $("#entregadorSelect").val();
            if(entregador != ""){
                $("#divTaxaEntregador").show();
                $("#divTaxaEntregador").val("");
            }else{
                $("#divTaxaEntregador").hide();
                $("#divTaxaEntregador").val("");
            }
		});

        $("#produtoSelect").change(function(){
            $("#medidaSelect").prop('disabled', false);
            $("#valor_unidade").val("");
            $("#quantidade").val("");
			var produto = $("#produtoSelect").val();
            $.ajax({
			    type: "POST",
				data: "idProduto=" + produto,
				url: "./Procedimentos/Produtos/ObterDadosProdutos.php",
				success:function(r){
                    dados = jQuery.parseJSON(r);
                    var valor_unidade = dados.valor_unidade;
                    var descricao = dados.descricao;
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
                                text: "UNIDADE - " + descricao
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
            var objectValue = $("#medidaSelect").val();
            var objectText = $("#medidaSelect option:selected").text();
            $("#valor_unidade").val(objectValue);
            $("#descricao").val(objectText);
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
        if ((quantidade == "") || (quantidade == 0)) {
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
                $("#medidaSelect").prop('disabled', true);
                $("#descricao").val("");
                $("#valor_unidade").val("");
                $("#quantidade").val("");
                alertify.success("ITEM ADICIONADO");
            }
        });
    });

    $('#btnCadastrar').click(function() {
        var cliente = $("#clienteSelect").val();
        var enderecoEntrega = $("#enderecoEntrega").val();
        
        if (cliente == "") {
			alertify.error("SELECIONE UM CLIENTE");
			return false;
		}
        if (enderecoEntrega == "") {
			alertify.error("PREENCHA O CAMPO 'ENDEREÇO'");
			return false;
		}
        
        dados = $('#frmPedido').serialize();

        $.ajax({
            type: "POST",
            data: dados,
            url: "./Procedimentos/Pedidos/CadastrarPedido.php",
            success: function(r) {
                if (r > 0) {
                    $('#carrinho_compras').load('./Views/Pedidos/CarrinhoCompras.php');
                    $('#frmPedido')[0].reset();
                    $("#clienteSelect").val("").change();
                    $("#enderecoEntrega").val("").change();
                    $("#divTaxaEntregador").hide();
                    alertify.success("CADASTRO REALIZADO");
                    // IMPRIMIR COMPROVANTE?
                    alertify.confirm('ATENÇÃO', 'DESEJA IMPRIMIR COMPROVANTE?', function(){
                        const ultimoPedido = r;
                        alertify.confirm().close();
                        window.open("./Procedimentos/Pedidos/CriarComprovante.php?idPedido=" + ultimoPedido);
                    }, function(){
                        // alertify.error('OPERAÇÃO CANCELADA');
                    });
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
                $("#valor_total").trigger('change');
                alertify.success("ITENS REMOVIDOS");
            }
        });
    });

    $('#btnCadastrarCliente').click(function() {
        $('#conteudo').load("./Views/Clientes/CadastrarClientes.php");	
    });

    $("#valorPagamento").change(function(){
        var valorTotal = $("#valor_total").val();
        var valorPagto = $("#valorPagamento").val();
        var valorTotalFormat = parseFloat(valorTotal);
        var valorPagtoFormat = parseFloat(valorPagto);

        if(valorPagtoFormat < valorTotalFormat){
            alertify.error("VALOR INVÁLIDO");
            $("#troco").val("");
            $("#valorPagamento").val("");
			return false;
        }else{
            const troco = valorPagtoFormat - valorTotalFormat;
            var eNaN = Number.isNaN(troco);
            if(eNaN == true){
                $("#troco").val("");
                $("#valorPagamento").val("");
                return false;
            }else{
                $("#troco").val(troco.toFixed(2));
            }
        }
    });
    
    $('#valor_total').change(function() {
        $("#valorPagamento").val("");
        $("#troco").val("");
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