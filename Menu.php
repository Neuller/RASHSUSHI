<?php require_once "./Dependencias.php" ?>

<!DOCTYPE html>
<html>

<head>
  <!-- CABEÇALHO -->
  <div class="navbar navbar-light bgGray">
    <div class="container">

      <!-- LOGO -->
      <div class="navbar-header logo">
        <a class="navbar-brand" href="./Inicio.php"><img class="img-responsive logoMenu img-thumbnail" src="./Img/NSERV.png" title="PÁGINA INICIAL" width="200px" height="150px"></a>
      </div>

      <!-- ITENS DE MENU -->
      <div id="navbar" class="collapse navbar-collapse">
        <!-- ITENS -->
        <ul class="nav navbar-nav navbar-right">
          <!-- CLIENTES -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black">
              <span class="glyphicon glyphicon-user"></span> Clientes<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="./CadastrarClientes.php" style="color: black">Novo Cliente</a></li>
              <li><a href="./Clientes.php" style="color: black">Procurar Clientes</a></li>
            </ul>
          </li>
          <!-- PRODUTOS -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black">
              <span class="glyphicon glyphicon-th"></span> Produtos<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="./CadastrarProdutos.php" style="color: black">Novo Produto</a></li>
              <hr>
              <li><a href="./HardDisk.php" style="color: black">Hard Disk (HD)</a></li>
              <li><a href="./Memoria.php" style="color: black">Memória</a></li>
              <li><a href="./PlacaVideo.php" style="color: black">Placa de Vídeo</a></li>
              <li><a href="./PlacaMae.php" style="color: black">Placa Mãe</a></li>
              <li><a href="./Processador.php" style="color: black">Processador</a></li>
              <li><a href="./Gabinete.php" style="color: black">Gabinete</a></li>
              <li><a href="./Monitor.php" style="color: black">Monitor</a></li>
              <li><a href="./Impressora.php" style="color: black">Impressora</a></li>
              <li><a href="./Outros.php" style="color: black">Outros</a></li>
            </ul>
          </li>
          <!-- SERVIÇOS -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black">
              <span class="glyphicon glyphicon-wrench"></span> Serviços<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="./CadastrarServicos.php" style="color: black">Novo Serviço</a></li>
              <li><a href="./Servicos.php" style="color: black">Procurar Serviços</a></li>
            </ul>
          </li>
           <!-- VENDAS -->
           <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black">
              <span class="glyphicon glyphicon-usd"></span> Vendas<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="./CadastrarVendas.php" style="color: black">Nova Venda</a></li>
              <li><a href="./Vendas.php" style="color: black">Procurar Vendas</a></li>
            </ul>
          </li>
          <!-- OPÇÕES -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black">
              <span class="glyphicon glyphicon-cog"></span> Opções<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <!-- USUÁRIOS -->
              <?php if ($_SESSION['User'] == "admin" || "ADMIN") : ?>
                <li>
                  <a href="Usuarios.php" style="color: black">
                    <span class="glyphicon glyphicon-user"></span> Usuários
                  </a>
                </li>
              <?php endif; ?>
              <!-- SAIR -->
              <li>
                <a style="color: red" href="Procedimentos/Sair.php">
                  <span class="glyphicon glyphicon-off"></span> Sair
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- IMAGEM BANNER -->
    <div class="divImagemBanner">
      <img src="./Img/Banner.png" class="img-fluid imagemBanner" title="SISTEMA DE GESTÃO NSERV">
    </div>
  </div>

</head>

</html>

<script type="text/javascript">

</script>

<style>
  .logo {
    position: relative;
    z-index: 2;
  }

  .divImagemBanner {
    top: 0;
  }

  .imagemBanner {
    width: 100%;
    position: relative;
    z-index: 1;
  }
</style>