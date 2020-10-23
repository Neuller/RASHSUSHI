<?php
require_once "../../Classes/Conexao.php";
$c = new conectar();
$conexao = $c -> conexao();
$sql = "SELECT id_pedido, id_cliente, id_produto, id_usuario, descricao, quantidade_itens, valor_total, status, data_hora_pedido
FROM pedidos";
$result = mysqli_query($conexao, $sql);
?>
<link rel="stylesheet" type="text/css" href="./Css/Formularios.css">
<div class="container">
	<div class="cabecalho bgGradient">
		<div class="text-center textCabecalho_White opacidade">
			<h3><strong>VISUALIZAR PEDIDO</strong></h3>
		</div>
	</div>

	<div id="visualizarPedido" tabindex="-1" role="dialog" aria-labelledby="modalVisualizar">
		<div class="modal-dialog modal-lg" role="document" data-keyboard="true">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="modal-content col-md-12 col-sm-12 col-xs-12">
					<div class="modal-header">
						<button type="button" id="btnClose" class="close" data-dismiss="modal" aria-label="Close" title="FECHAR"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form id="frmPedidoV">
							<!-- ID PEDIDO -->
							<div>
								<input type="text" hidden="" id="idPedidoV" name="idPedidoV">
                            </div>
                            <!-- FORMULÁRIO DADOS DO CLIENTE -->
							<div class='col-md-12 col-sm-12 col-xs-12 tituloFormulario'>
								<div class="text-left">
									<h4><strong>DADOS DO CLIENTE</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
								</div>
								<hr>
                            </div>
                            <!-- NOME -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormulario">
								<div>
									<label>NOME COMPLETO</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="nomeV" name="nomeV">
								</div>
							</div>
							<!-- CPF -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CPF</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="cpfV" name="cpfV">
								</div>
							</div>
							<!-- CNPJ -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
									<div>
									<label>CNPJ</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="cnpjV" name="cnpjV">
								</div>
                            </div>
                            <!-- TELEFONE -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>TELEFONE</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="telefoneV" name="telefoneV">
								</div>
							</div>
                            <!-- CELULAR -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormulario">
								<div>
									<label>CELULAR</label>
									<input readonly type="text" class="form-control input-sm align text-uppercase" id="celularV" name="celularV">
								</div>
                            </div>
                            
                            <!-- DADOS DO PEDIDO -->
                            <div class='col-xs-12 col-md-12 col-sm-12 separador'>
                                <div class="text-left">
                                    <h4><strong>DADOS DO PEDIDO</strong><span class="glyphicon glyphicon-shopping-cart ml-15"></span></h4>
                                </div>
                                <hr>
                            </div>
							<!-- DESCRIÇÃO DO PRODUTO -->
                            <div class="mb-20px col-xs-12 col-md-12 col-sm-12 itensFormularioCadastro">
                                <div>
                                    <label>DESCRIÇÃO</label>
                                    <input readonly type="text" class="form-control input-sm text-uppercase" id="descricaoV" name="descricaoV" maxlenght="100">
                                </div>
                            </div>
                            <!-- QUANTIDADE -->
                            <div class="mb-20px col-xs-6 col-md-6 col-sm-6 itensFormularioCadastro">
                                <div>
                                    <label>QUANTIDADE</label>
                                    <input readonly type="number" class="form-control input-sm text-uppercase" id="quantidadeV" name="quantidadeV" maxlenght="100">
                                 </div>
                            </div>
                            <!-- VALOR UNITÁRIO -->
                            <div class="mb-20px col-xs-6 col-md-6 col-sm-6 itensFormularioCadastro">
                                <div>
                                    <label>VALOR UNITÁRIO</label>
                                    <input readonly type="text" class="form-control input-sm text-uppercase" id="valor_unidadeV" name="valor_unidadeV" maxlenght="100">
                                </div>
                            </div>
                            <!-- STATUS -->
                            <div class="mb-20px col-xs-6 col-md-6 col-sm-6 itensFormularioCadastro">
                                <div>
                                    <label>STATUS</label>
                                    <input readonly type="number" class="form-control input-sm text-uppercase" id="statusV" name="statusV" maxlenght="100">
                                 </div>
                            </div>
                            <!-- DATA E HORA -->
                            <div class="mb-20px col-xs-6 col-md-6 col-sm-6 itensFormularioCadastro">
                                <div>
                                    <label>DATA / HORA</label>
                                    <input readonly type="text" class="form-control input-sm text-uppercase" id="data_horaV" name="data_horaV" maxlenght="100">
                                </div>
                            </div>
                            <!-- FORMA DE PAGAMENTO -->
                            <div class="mb-20px col-xs-6 col-md-6 col-sm-6 itensFormularioCadastro">
                                <div>
                                    <label>FORMA DE PAGAMENTO</label>
                                    <input readonly type="text" class="form-control input-sm text-uppercase" id="forma_pagamentoV" name="forma_pagamentoV" maxlenght="100">
                                </div>
                            </div>
                            <!-- VALOR TOTAL -->
                            <div class="mb-20px col-xs-6 col-md-6 col-sm-6 itensFormularioCadastro">
                                <div>
                                    <label>VALOR TOTAL</label>
                                    <input readonly type="text" class="form-control input-sm text-uppercase" id="valor_totalV" name="valor_totalV" maxlenght="100">
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
		$('#conteudo').load("./Views/Pedidos/ProcurarPedidos.php");	
	});
</script>

<style>
	.cabecalho {
		margin-bottom: 50px;
	}
</style>
