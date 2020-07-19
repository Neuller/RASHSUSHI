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

        $sql = "SELECT ID_Status, Nome_Status FROM status";

        $result = mysqli_query($conexao, $sql);

        ?>
    </head>

    <body>
        <div class="container">
            <!-- CABEÇALHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>CADASTRAR SERVIÇOS</strong></h3>
                </div>
            </div>
            <!-- FORMULÁRIO DE CADASTRO -->
            <div class="divFormulario">
                <div class="mx-auto">
                    <form id="frmNovoServico">
                        <!-- FORMULÁRIO DADOS PESSOAIS -->
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class="text-left">
                                <h4><strong>DADOS DO CLIENTE</strong><span class="glyphicon glyphicon-user ml-15"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <!-- CLIENTE -->
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
                        <!-- FORMULÁRIO INFORMAÇÕES DO EQUIPAMENTO / SERVIÇO -->
                        <div class='col-md-12 col-sm-12 col-xs-12 separador'>
                            <div class="text-left">
                                <h4><strong>INFORMAÇÕES DO EQUIPAMENTO E SERVIÇO</strong><span class="glyphicon glyphicon-wrench ml-15"></span></h4>
                            </div>
                            <hr>
                        </div>
                        <!-- EQUIPAMENTO -->
                        <div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
                            <div>
                                <label>EQUIPAMENTO / MARCA / MODELO<span class="required">*</span></label>
                                <input type="text" class="form-control input-sm text-uppercase" id="equipamento" name="equipamento" maxlength="50">
                            </div>
                        </div>
                        <!-- NÚMERO DE SÉRIE -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                            <div>
                                <label>NÚMERO DE SÉRIE<span class="required">*</span></label>
                                <input type="text" class="form-control input-sm text-uppercase" id="serialnumber" name="serialnumber" maxlength="50">
                            </div>
                        </div>
                        <!-- STATUS -->
                        <div class="mb-20px col-md-6 col-sm-6 col-xs-6 itensFormularioCadastro">
                            <div>
                                <label>STATUS DO SERVIÇO<span class="required">*</span></label>
                                <select class="form-control input-sm" id="StatusSelect" name="StatusSelect">
                                    <option value="">SELECIONE UM STATUS</option>
                                    <?php
                                    $sql = "SELECT ID_Status, Nome_Status FROM status";
                                    $result = mysqli_query($conexao, $sql);

                                    while ($Nome = mysqli_fetch_row($result)) :
                                    ?>
                                        <option value="<?php echo $Nome[0] ?>"><?php echo $Nome[1] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <!-- OBSERVAÇÕES -->
                        <div class="mb-20px col-md-12 col-sm-12 col-xs-12 itensFormularioCadastro">
                            <div>
                                <label>OBSERVAÇÕES</label>
                                <textarea type="text" class="form-control input-sm text-uppercase" id="informacao" 
                                name="informacao" maxlength="100" rows="3" style="resize: none"></textarea >
                            </div>
                        </div>
                        <!-- BOTÃO CADASTRAR -->
                        <div class="btnCadastrar">
                            <span class="btn btn-primary" id="btnCadastrar" title="CADASTRAR">CADASTRAR</span>
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
            $('#clienteSelect').select2();
            $('#btnCadastrar').click(function() {
                // VALIDAR CAMPOS
                var nomeCliente = frmNovoServico.clienteSelect.value;
                var status = frmNovoServico.StatusSelect.value;
                var equipamento = frmNovoServico.equipamento.value;
                var serialnumber = frmNovoServico.serialnumber.value;

                if (nomeCliente == "") {
                    alertify.alert("ATENÇÃO", "Selecione um cliente.");
                    return false;
                }
                if (status == "") {
                    alertify.alert("ATENÇÃO", "Selecione um status.");
                    return false;
                }
                if (equipamento == "") {
                    alertify.alert("ATENÇÃO", "Preencha o campo Equipamento.");
                    return false;
                }
                if (serialnumber == "") {
                    alertify.alert("ATENÇÃO", "Preencha o campo N° Serial.");
                    return false;
                }

                dados = $('#frmNovoServico').serialize();
                $.ajax({
                    type: "POST",
                    data: dados,
                    url: "./Procedimentos/Servicos/CadastrarServico.php",
                    success: function(r) {
                        if (r == 1) {
                            $('#frmNovoServico')[0].reset();
                            alertify.success("Cadastro realizado com sucesso");
                        } else {
                            alertify.error("Não foi possível adicionar");
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