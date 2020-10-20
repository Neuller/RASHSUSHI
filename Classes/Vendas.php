<?php 
class vendas{
// MÉTODO RETORNAR DADOS 
public function obterDadosProdutos($idProduto){
	$c= new conectar();
	$conexao=$c->conexao();

	$sql="SELECT Codigo, Descricao, Preco, PrecoInstalacao, Estoque, NF, NCM
	FROM produtosnserv  
	WHERE ID_Produto = '$idProduto'";
	$result=mysqli_query($conexao,$sql);

	$mostrar=mysqli_fetch_row($result);


	$dados=array(
	'Codigo' => $mostrar[0],
	'Descricao' => $mostrar[1],
	'Preco' => $mostrar[2],
    'PrecoInstalacao' => $mostrar[3],
    'Estoque' => $mostrar[4],
    'NF' => $mostrar[5],
    'NCM' => $mostrar[6]
	);		
	return $dados;
}
// MÉTODO ADICIONAR
public function adicionarVenda(){
    $c= new conectar();
    $conexao=$c->conexao();

    $data = date('Y-m-d');
    $idVenda = self::criarComprovante();
    $dados = $_SESSION['tabelaVendasTemp'];
    $idUsuario = $_SESSION['User'];
    $r = 0;

    for ($i=0; $i < count($dados) ; $i++) { 
        $d=explode("||", $dados[$i]);

        $sql="INSERT INTO vendas (ID_Venda, ID_Cliente, ID_Produto, ID_Usuario, ValorTotal, DataVenda)
        VALUES ('$idVenda', '$d[7]', '$d[0]', '$idUsuario', '$d[6]', '$data')";

        $r=$r + $result=mysqli_query($conexao,$sql);
    }
    return $r;
}
public function criarComprovante(){
    $c= new conectar();
    $conexao=$c->conexao();

    $sql="SELECT ID_Venda from vendas group by ID_Venda desc";

    $resul=mysqli_query($conexao,$sql);
    $id=mysqli_fetch_row($resul)[0];

    if($id=="" or $id==null or $id==0){
        return 1;
    }else{
        return $id + 1;
    }
}
// MÉTODOS INFORMAÇÕES DO CLIENTE PELO ID

}
?>