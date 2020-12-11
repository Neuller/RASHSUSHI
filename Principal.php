<?php
session_start();
if (isset($_SESSION['User'])) {
?>

<!DOCTYPE html>
<html>

<head>
  <title>SISTEMA DE GESTÃO - RASH SUSHI</title>
  <?php require_once "./Classes/Conexao.php";
        
	$c = new conectar();
  $conexao = $c->conexao();
  
  $idUsuario = $_SESSION['IDUser'];

	$sql = "SELECT * FROM usuarios WHERE id_usuario = '$idUsuario' AND grupo = 1";

  $result = mysqli_query($conexao, $sql);

  $administrador = false;

  if (mysqli_num_rows($result) > 0) {
    $administrador = true;
  }
	?>
	<?php require_once "./Dependencias.php" ?>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- SIDEBAR -->
    <!-- MENU LATERAL -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading rashSushi">RASH SUSHI</div>

      <div class="group-menu list-group list-group-flush">
        <!-- PAGINA INICIAL -->
		    <div class="nav-item active">
          <a id="inicio" class="nav-link">INÍCIO</a>
        </div>
		
      <!-- CATEGORIAS -->
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CATEGORIAS
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a id="cadastrarCategoria" class="dropdown-item" href="#">CADASTRAR CATEGORIA</a>
          <a id="procurarCategoria" class="dropdown-item" href="#">PROCURAR CATEGORIA <span class="required">- VERSÃO COMPLETA</span></a>
        </div>
      </div>

      <!-- CLIENTES -->
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CLIENTES
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a id="cadastrarCliente" class="dropdown-item" href="#">CADASTRAR CLIENTE</a>
          <a id="procurarCliente" class="dropdown-item" href="#">PROCURAR CLIENTE</a>
        </div>
      </div>

		<!-- ENTREGADORES -->
		<div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  ENTREGADORES
            </a>
			<!-- LISTA ENTREGADORES -->
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a id="cadastrarEntregador" class="dropdown-item" href="#">CADASTRAR ENTREGADOR</a>
                <a id="procurarEntregador" class="dropdown-item" href="#">PROCURAR ENTREGADOR <span class="required">- VERSÃO COMPLETA</span></a>
            </div>
        </div>

		<!-- FINANCEIRO -->
		<div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  FINANCEIRO
              </a>
			  <!-- LISTA FINANCEIRO -->
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a id="cadastrarFinanca" class="dropdown-item" href="#">CADASTRAR FINANÇA</a><a class="dropdown-item" href="#"></a>
              <a id="fluxoCaixa" class="dropdown-item" href="#">FLUXO DE CAIXA</a>
              </div>
        </div>

		<!-- FORNECEDORES -->
		<div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  FORNECEDORES
              </a>
			  <!-- LISTA FORNECEDORES -->
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a id="cadastrarFornecedor" class="dropdown-item" href="#">CADASTRAR FORNECEDOR</a>
                <a id="procurarFornecedor" class="dropdown-item" href="#">PROCURAR FORNECEDOR <span class="required">- VERSÃO COMPLETA</span></a>
              </div>
            </div>

			<!-- PEDIDOS -->
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  	      PEDIDOS
              </a>
			  <!-- LISTA PEDIDOS -->
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a id="cadastrarPedido"class="dropdown-item" href="#">CADASTRAR PEDIDOS</a>
                <a id="procurarPedido" class="dropdown-item" href="#">PROCURAR PEDIDOS</a>
              </div>
            </div>

			<!-- PRODUTOS -->
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    PRODUTOS
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a id="cadastrarProduto" class="dropdown-item" href="#">CADASTRAR PRODUTO</a>
          <a id="cadastrarCombinado" class="dropdown-item" href="#">CADASTRAR COMBINADO</a>
          <a id="procurarCombinado" class="dropdown-item" href="#">PROCURAR COMBINADO <span class="required">- VERSÃO COMPLETA</span></a>
          <a id="procurarProduto" class="dropdown-item" href="#">PROCURAR PRODUTO</a>
        </div>
      </div>

			<!-- RELATORIOS -->
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  RELATORIOS
              </a>
			  <!-- LISTA RELATORIOS -->
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a id="relatorioDiario" class="dropdown-item" href="#">GERAR RELATORIO DIÁRIO</a>
                <a id="relatorioSemanal" class="dropdown-item" href="#">GERAR RELATORIO SEMANAL <span class="required">- VERSÃO COMPLETA</span></a>
                <a id="relatorioMensal" class="dropdown-item" href="#">GERAR RELATORIO MENSAL <span class="required">- VERSÃO COMPLETA</span></a>
              </div>
			</div>

			<!-- USUARIOS -->
      <?php if ($administrador == true) : ?>
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  	USUÁRIOS
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a id="cadastrarUsuario" class="dropdown-item" href="#">CADASTRAR USUÁRIO</a>
          <a id="procurarUsuario" class="dropdown-item" href="#">PROCURAR USUÁRIO <span class="required">- VERSÃO COMPLETA</span></a>
        </div>
      </div>
      <?php endif; ?>

      <!-- VEÍCULOS -->
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  	VEÍCULOS
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a id="cadastrarVeiculo" class="dropdown-item" href="#">CADASTRAR VEÍCULOS</a>
          <a id="procurarVeiculo" class="dropdown-item" href="#">PROCURAR VEÍCULOS <span class="required">- VERSÃO COMPLETA</span></a>
        </div>
      </div>

      <!-- OPÇÕES -->
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  	OPÇÕES
        </a>
        <!-- CADASTRAR MELHORIAS -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a id="cadastrarMelhoria" class="dropdown-item" href="#">CADASTRAR MELHORIAS</a>
        </div>
      </div>

			<div class="dropdown-divider"></div>
      <!-- SAIR -->
			<div>
				<a style="color: red" href="./Procedimentos/Sair.php" class="dropdown-item" href="#" title="SAIR"><span class="glyphicon glyphicon-off"></span> SAIR</a>
			</div>
    </div>
      
      <!-- DESENVOLVIDO POR -->
      <div class="navbar development">
        <div>DESENVOLVIDO POR </div>
        <div class="nservIcon">
          <img class="img-responsive img-thumbnail" src="./Img/NSERV.png" title="NSERV - SERVIÇOS E SOLUÇÕES DIGITAIS" width="35px" height="35px">
        </div>
      </div>

    </div>
    <!-- /#SIDEBAR-WRAPPER -->

    <!-- PAGE CONTENT -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
       

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <button class="btn btn-white btnMenu" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
		  	    <a id="logoDireito"><img src="./Img/RASHSUSHI.png" class="img-circle fotoRounded" alt="RASH SUSHI" title="RASH SUSHI" width="150px" height="75px"></a>
          </ul>
        </div>
      </nav>

	  <!-- CONTEUDO -->
    <div id="conteudo">
        
	  </div>
	  
    </div>
    <!-- /#PAGE-CONTENT-WRAPPER -->

  </div>
  <!-- /#WRAPPER -->
</body>

</html>

<script type="text/javascript">
  $(document).ready(function($) {
    $('#conteudo').load("./Views/Inicio/Inicio.php");	
  });
  
	// MENU LATERAL
	$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
	// INICIO
	$("#inicio").click(function(e) {
		$('#conteudo').load("./Views/Inicio/Inicio.php");	
  });
	// LOGO
	$("#logoDireito").click(function(e) {
		$('#conteudo').load("./Views/Inicio/Inicio.php");	
  });
  // CATEGORIAS
	$("#cadastrarCategoria").click(function(e) {
		$('#conteudo').load("./Views/Categorias/CadastrarCategoria.php");	
  });
	$("#procurarCliente").click(function(e) {
		$('#conteudo').load("./Views/Clientes/ProcurarClientes.php");	
  });
	// CLIENTES
	$("#cadastrarCliente").click(function(e) {
		$('#conteudo').load("./Views/Clientes/CadastrarClientes.php");	
  });
	$("#procurarCliente").click(function(e) {
		$('#conteudo').load("./Views/Clientes/ProcurarClientes.php");	
  });
  // COMBINADOS
  $("#cadastrarCombinado").click(function(e) {
    $('#conteudo').load("./Views/Combinados/CadastrarCombinado.php");	
  });
  $("#procurarCombinado").click(function(e) {
    $('#conteudo').load("./Views/Combinados/ProcurarCombinado.php");	
  });
  // ENTREGADORES
  $("#cadastrarEntregador").click(function(e) {
    $('#conteudo').load("./Views/Entregadores/CadastrarEntregador.php");	
  });
  // FINANCEIRO
  $("#cadastrarFinanca").click(function(e) {
    $('#conteudo').load("./Views/Financeiro/CadastrarFinanca.php");	
  });
  $("#fluxoCaixa").click(function(e) {
    $('#conteudo').load("./Views/Financeiro/FluxoCaixa.php");	
  });
  // FORNECEDORES
  $("#cadastrarFornecedor").click(function(e) {
    $('#conteudo').load("./Views/Fornecedores/CadastrarFornecedor.php");	
  });
  // MELHORIAS
  $("#cadastrarMelhoria").click(function(e) {
    $('#conteudo').load("./Views/Melhorias/CadastrarMelhoria.php");	
  });
  // PEDIDOS
  $("#cadastrarPedido").click(function(e) {
    moment.locale('pt-br');
    var data = moment().format('DD/MM/YYYY');
    $.ajax({
		  type: "POST",
      data: "data=" + data,
      url: "./Procedimentos/Financeiro/VerificarStatusCaixa.php",
      success: function(r) {
        retorno = $.parseJSON(r);
        if (retorno == "ABERTO") {
          $('#conteudo').load("./Views/Pedidos/CadastrarPedido.php");	
        } else {
          alertify.error("VERIFIQUE O STATUS DO CAIXA");
      	}
      }
	  });
  });
  $("#procurarPedido").click(function(e) {
    $('#conteudo').load("./Views/Pedidos/ProcurarPedidos.php");	
  });
  // PRODUTOS
  $("#cadastrarProduto").click(function(e) {
    $('#conteudo').load("./Views/Produtos/CadastrarProduto.php");	
  });
  $("#procurarProduto").click(function(e) {
    $('#conteudo').load("./Views/Produtos/ProcurarProduto.php");	
  });
  // RELATÓRIOS 
  $("#relatorioDiario").click(function(e) {
    moment.locale('pt-br');
    var data = moment().format('DD/MM/YYYY');
    $.ajax({
		  type: "POST",
      data: "data=" + data,
      url: "./Procedimentos/Financeiro/VerificarStatusCaixa.php",
      success: function(r) {
        retorno = $.parseJSON(r);
        if (retorno == "FECHADO") {
          $('#conteudo').load("./Views/Relatorios/GerarRelatorioDiario.php");	
        } else {
          alertify.error("VERIFIQUE O STATUS DO CAIXA");
      	}
      }
	  });
  });
  // USUÁRIOS
  $("#cadastrarUsuario").click(function(e) {
      $('#conteudo').load("./Views/Usuarios/CadastrarUsuario.php");	
  });
  // VEÍCULOS
  $("#cadastrarVeiculo").click(function(e) {
      $('#conteudo').load("./Views/Veiculos/CadastrarVeiculo.php");	
  });

  function removeAcentos(char) {
    let map = {
      â: "a",
      Â: "A",
      à: "a",
      À: "A",
      á: "a",
      Á: "A",
      ã: "a",
      Ã: "A",
      ê: "e",
      Ê: "E",
      è: "e",
      È: "E",
      é: "e",
      É: "E",
      î: "i",
      Î: "I",
      ì: "i",
      Ì: "I",
      í: "i",
      Í: "I",
      õ: "o",
      Õ: "O",
      ô: "o",
      Ô: "O",
      ò: "o",
      Ò: "O",
      ó: "o",
      Ó: "O",
      ü: "u",
      Ü: "U",
      û: "u",
      Û: "U",
      ú: "u",
      Ú: "U",
      ù: "u",
      Ù: "U",
      ç: "c",
      Ç: "C",
    };
  return char.replace(/[\W\[\] ]/g, function (a) {
    return map[a] || a;
  });
}
</script>

<?php
} else {
	header("location: ./index.php");
}
?>