<?php 
class pedidos {
    public function cadastrarPedido(){
        $c = new conectar();
        $conexao = $c -> conexao();

        $data_hora = date('Y-m-d H:i:s');
        $idPedido = self::criarComprovante();
        $dados = $_SESSION['tabelaTemporaria'];
        $idUsuario = $_SESSION['User'];
        $r = 0;

        for ($i = 0; $i < count($dados) ; $i++) { 
            $d = explode("||", $dados[$i]);

            $sql="INSERT INTO pedidos (id_pedido, id_cliente, id_produto, id_usuario, valor_total, status, data_hora_pedido)
            VALUES ('$idPedido', '$d[6]', '$d[0]', '$idUsuario', '$d[5]', 'EM ABERTO', '$data_hora')";

            $r = $r + $result = mysqli_query($conexao,$sql);
        }
        return $r;
    }
    public function criarComprovante(){
        $c = new conectar();
        $conexao = $c -> conexao();
    
        $sql = "SELECT id_pedido from pedidos group by id_pedido desc";
    
        $resul = mysqli_query($conexao,$sql);
        $id = mysqli_fetch_row($resul)[0];
    
        if($id == "" or $id == null or $id == 0){
            return 1;
        }else{
            return $id + 1;
        }
    }
    public function excluirPedido($idPedido){
        $c = new conectar();
        $conexao = $c -> conexao();
    
        $sql = "DELETE from pedidos WHERE id_pedido = '$idPedido' ";
    
        return mysqli_query($conexao, $sql);
    }
}
?>