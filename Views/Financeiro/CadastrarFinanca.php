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
					<h3><strong>CADASTRAR FINANÇAS</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmFinanca">
					    <!-- DESCRICAO -->
						<div class="col-md-12 col-sm-12 col-xs-12 itensFormulario">
							<div>
								<label>DESCRIÇÃO<span class="required">*</span></label>
								<input type="text" class="form-control input-sm text-uppercase" id="descricao" name="descricao" maxlenght="500">
							</div>
						</div>
						<!-- TIPO -->
						<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
							<div>
                                <label>TIPO<span class="required">*</span></label>
                                <select class="form-control input-sm" id="tipoFinanca" name="tipoFinanca">
                                    <option value="">SELECIONE UM TIPO DE FINANÇA</option>
                                    <option value="DEBITO">DÉBITO</option>
                                    <option value="CREDITO">CRÉDITO</option>
                                </select>
							</div>
						</div>
						<!-- VALOR -->
						<div class="col-md-6 col-sm-6 col-xs-6 itensFormulario">
							<div>
					    		<label>VALOR<span class="required">*</span></label>
								<input type="number" class="form-control input-sm text-uppercase" id="valor" name="valor" maxlenght="10">
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
	});

    $('#btnCadastrar').click(function() {
				var nome = frmFinanca.nome.value;
				var cpf = frmFinanca.cpf.value;
				var cnpj = frmFinanca.cnpj.value;
				var celular = frmFinanca.celular.value;
                var tabela = "fornecedores";

				if ((nome == "") || (celular == "")) {
					alertify.error("PREENCHA TODOS OS CAMPOS OBRIGATÓRIOS");
					return false;
				}
                
                if ((cpf != "") || (cnpj != "")){
                    $.ajax({ 
					type: 'POST',
					data:{"CPF" : cpf, "CNPJ" : cnpj, "TABELA" : tabela},
					url: './Procedimentos/Verificacoes/Verificar_CPF_CNPJ.php', 
                        success: function(r) { 
                            data = $.parseJSON(r);
                            if (data == 0) {
                                dados = $('#frmFinanca').serialize();
                                    $.ajax({
                                        type: "POST",
                                        data: dados,
                                        url: "./Procedimentos/Fornecedores/CadastrarFornecedor.php",
                                        success: function(r) {
                                            if (r == 1) {
                                                $('#frmFinanca')[0].reset();
                                                alertify.success("CADASTRO REALIZADO");
                                            } else {
                                                alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
                                            }
                                        }
                                    });
                            }else{
                                alertify.error("CPF OU CNPJ JÁ CADASTRADO");
                            }
                        }
				    });
                }else{
                    dados = $('#frmFinanca').serialize();
                    $.ajax({
						type: "POST",
						data: dados,
						url: "./Procedimentos/Fornecedores/CadastrarFornecedor.php",
						success: function(r) {
							if (r == 1) {
								$('#frmFinanca')[0].reset();
								alertify.success("CADASTRO REALIZADO");
							} else {
								alertify.error("NÃO FOI POSSÍVEL CADASTRAR");
							}
						}
					});
                }
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