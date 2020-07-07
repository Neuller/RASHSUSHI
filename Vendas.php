<!-- VERIFICA SESSÃO LOGADA -->
<?php
session_start();
if (isset($_SESSION['User'])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <!-- MENU -->
        <?php require_once "./Classes/Conexao.php";
        $c = new conectar();
        $conexao = $c->conexao();
        ?>
        <?php require_once "./Menu.php"; ?>
    </head>

    <body>
        <div class="tblVendas container">
            <!-- CABEÇALHO -->
            <div class="cabecalho bgGray">
                <div class="text-center textCabecalho opacidade">
                    <h3><strong>TABELA DE VENDAS</strong></h3>
                </div>
            </div>
        </div>
    </body>

    </html>

    <!-- SE NÂO ESTIVAR LOGADO RETORNA À PÁGINA INICIAL -->
<?php
} else {
    header("location:./index.php");
}
?>