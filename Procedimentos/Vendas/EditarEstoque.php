<?php 
    require_once "../../Classes/Conexao.php";

    $c = new conectar();
    $conexao = $c->conexao();

    $dados = $_POST['dados'];

    $converte_array = explode(",",$dados );

    $idProduto = $converte_array[0];
    $estoque = $converte_array[1];

    $sqlU = "UPDATE produtosnserv SET Estoque = '$estoque' WHERE ID_Produto = '$idProduto' ";

    mysqli_query($conexao,$sqlU); 
?>