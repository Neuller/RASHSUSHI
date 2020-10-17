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
					<h3><strong>CADASTRAR ENTREGADOR</strong></h3>
				</div>
			</div>
			<!-- FORMULÁRIO DE CADASTRO -->
			<div class="divFormulario">
				<div class="mx-auto">
					<form id="frmEntregador">
						<div>
							<!-- FORMULÁRIO DADOS PESSOAIS -->
							<div class='col-md-12 col-sm-12 col-xs-12'>
								<div class="text-left">
									<h4><strong>DADOS PESSOAIS</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- NOME -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
									<label>NOME COMPLETO<span class="required">*</span></label>
									<input type="text" class="form-control input-sm text-uppercase" id="nome" name="nome" maxlenght="100">
								</div>
							</div>
							<!-- CPF -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>CPF</label>
									<input type="text" class="form-control input-sm align cpf text-uppercase" placeholder="###.###.###-##" id="cpf" name="cpf" maxlenght="100">
								</div>
							</div>
							<!-- CNPJ -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>CNPJ</label>
									<input type="text" class="form-control input-sm align cnpj text-uppercase" placeholder="##.###.###/####-##" id="cnpj" name="cnpj" maxlenght="100">
								</div>
							</div>
							<!-- E-MAIL -->
							<div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
								<div>
									<label>E-MAIL</label>
									<input type="text" class="form-control input-sm align text-uppercase" placeholder="exemplo@exemplo.com" id="email" name="email" maxlenght="100">
								</div>
							</div>

							<!-- FORMULÁRIO ENDEREÇO -->
							<div class='separador col-md-12 col-sm-12 col-xs-12'>
								<div class="text-left">
									<h4><strong>ENDEREÇO</strong><span class="glyphicon glyphicon-home ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- CEP -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>CEP</label>
									<input type="text" class="form-control input-sm align cep text-uppercase" placeholder="#####-###" id="cep" name="cep" maxlenght="100">
								</div>
							</div>
							<!-- BAIRRO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>BAIRRO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="bairro" name="bairro" maxlenght="100">
								</div>
							</div>
							<!-- ENDEREÇO -->
							<div class="mb-20px col-md-8 col-sm-8 col-xs-8 itensFormularioCadastro">
								<div>
									<label>ENDEREÇO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="endereco" name="endereco" maxlenght="100">
								</div>
							</div>
							<!-- UF -->
							<div class="mb-20px col-md-4 col-sm-4 col-xs-4 itensFormularioCadastro">
								<div>
									<label>UF</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="uf" name="uf" maxlenght="100">
								</div>
							</div>
							<!-- NÚMERO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>NÚMERO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="numero" name="numero" maxlenght="100">
								</div>
							</div>
							<!-- COMPLEMENTO -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>COMPLEMENTO</label>
									<input type="text" class="form-control input-sm align text-uppercase" id="complemento" name="complemento" maxlenght="100">
								</div>
							</div>

							<!-- FORMULÁRIO TELEFONES -->
							<div class='separador col-md-12 col-sm-12 col-xs-12'>
								<div class="text-left">
									<h4><strong>TELEFONES</strong><span class="glyphicon glyphicon-phone-alt ml-15"></span></h4>
								</div>
								<hr>
							</div>
							<!-- TELEFONE -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>TELEFONE</label>
									<input type="text" class="form-control input-sm align telefone text-uppercase" placeholder="(##) ####-####" id="telefone" name="telefone" maxlenght="100">
								</div>
							</div>
							<!-- CELULAR -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>CELULAR<span class="required">*</span></label>
									<input type="text" class="form-control input-sm align celular text-uppercase" placeholder="(##) # ####-####" id="celular" name="celular" maxlenght="100">
								</div>
							</div>
							<!-- TELEFONE 2 -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>TELEFONE 2</label>
									<input type="text" class="form-control input-sm align telefone2 text-uppercase" placeholder="(##) ####-####" id="telefone2" name="telefone2" maxlenght="100">
								</div>
							</div>
							<!-- CELULAR 2 -->
							<div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
								<div>
									<label>CELULAR 2</label>
									<input type="text" class="form-control input-sm align celular2 text-uppercase" placeholder="(##) # ####-####" id="celular2" name="celular2" maxlenght="100">
								</div>
							</div>

                            <!-- DADOS DO VEÍCULO -->
							<div class='separador col-md-12 col-sm-12 col-xs-12'>
								<div class="text-left">
									<h4><strong>DADOS DO VEÍCULO</strong><i class="fa fa-lg fa-motorcycle ml-15"></i></h4>
								</div>
								<hr>
							</div>
                            <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                                <div>
                                    <label>VEÍCULO</label>
                                    <select class="form-control input-sm" id="veiculoSelect" name="veiculoSelect">
                                        <option value="">SELECIONE UM VEÍCULO</option>
                                        <?php
                                        $sql = "SELECT id_veiculo, marca_modelo FROM veiculos ORDER BY id_veiculo DESC";
                                        $result = mysqli_query($conexao, $sql);

                                        while ($veiculo = mysqli_fetch_row($result)) :
                                        ?>
                                            <option value="<?php echo $veiculo[0] ?>"><?php echo $veiculo[1] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
							<!-- BOTÂO CADASTRAR -->
							<div class="btnCadastrar">
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
			$('.cpf').mask('999.999.999-99');
			$('.cnpj').mask('99.999.999/9999-99');
			$('.cep').mask('99999-999');
			$('.telefone').mask('(99) 9999-9999');
			$('.telefone2').mask('(99) 9999-9999');
			$('.celular').mask('(99) 9 9999-9999');
			$('.celular2').mask('(99) 9 9999-9999');
			$('#veiculoSelect').select2();

			$(".cep").change(function(){
				var cep = frmEntregador.cep.value;
				var urlPesquisaCep = "https://viacep.com.br/ws/"+cep+"/json";
				
				$.ajax({
					type: "GET",
					dataType: "JSON",
					url: urlPesquisaCep,
					success:function(r){
						$("#bairro").val(r.bairro);
						$("#endereco").val(r.logradouro);
						$("#complemento").val(r.complemento);
						$("#uf").val(r.uf);
					},
					error:function(){
						alertify.error("CEP INVÁLIDO");
						$("#cep").val("");
						return false;
					}
				});
			});		
		});

        $('#btnCadastrar').click(function() {
				var nome = frmEntregador.nome.value;
				var cpf = frmEntregador.cpf.value;
				var cnpj = frmEntregador.cnpj.value;
				var celular = frmEntregador.celular.value;
                var tabela = "entregadores";

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
                                dados = $('#frmEntregador').serialize();
                                    $.ajax({
                                        type: "POST",
                                        data: dados,
                                        url: "./Procedimentos/Entregadores/CadastrarEntregador.php",
                                        success: function(r) {
                                            if (r == 1) {
                                                $('#frmEntregador')[0].reset();
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
                    dados = $('#frmEntregador').serialize();
                    $.ajax({
						type: "POST",
						data: dados,
						url: "./Procedimentos/Entregadores/CadastrarEntregador.php",
						success: function(r) {
							if (r == 1) {
								$('#frmEntregador')[0].reset();
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