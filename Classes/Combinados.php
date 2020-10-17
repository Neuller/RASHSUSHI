<?php 
class combinados{
	public function cadastrarCombinado($dados){
        $c = new conectar();
        $conexao = $c->conexao();
    
        $sql = "INSERT INTO produtos_combinado (id_produto, id_usuario, descricao, quantidade_pecas, valor_total) 
        VALUES ('$dados[0]','$dados[1]', '$dados[2]','$dados[3]', '$dados[4]')";
    
        return mysqli_query($conexao, $sql);
    }
    public function obterCombinados($idProduto){
        $c = new conectar();
        $conexao = $c->conexao();
    
        $sql = "SELECT id_combinado, id_produto, id_usuario, descricao, quantidade_pecas, valor_total 
        FROM produtos_combinado 
        WHERE id_produto = '$idProduto'";
    
        return mysqli_query($conexao, $sql);
    }
}
?>