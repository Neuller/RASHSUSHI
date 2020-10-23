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

            $sql="INSERT INTO pedidos (id_pedido, id_cliente, id_produto, id_usuario, descricao, quantidade_itens, valor_total, status, data_hora_pedido)
            VALUES ('$idPedido', '$d[6]', '$d[0]', '$idUsuario', '$d[1]', '$d[4]', '$d[5]', 'EM ABERTO', '$data_hora')";

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

    public function obterDadosPedido($idPedido){
        $c = new conectar();
        $conexao = $c -> conexao();
    
        $sql = "SELECT id_pedido, id_cliente, id_produto, id_usuario, descricao, quantidade_itens, valor_total, status, data_hora_pedido
        FROM pedidos 
        WHERE id_pedido = '$idPedido' ";
    
        $result = mysqli_query($conexao, $sql);
        $mostrar = mysqli_fetch_row($result);
    
        $dados = array(
            'id_pedido' => $mostrar[0],
            'id_cliente' => $mostrar[1],
            'id_produto' => $mostrar[2],
            'id_usuario' => $mostrar[3],
            'descricao' => $mostrar[4],
            'quantidade_itens' => $mostrar[5],
            'valor_total' => $mostrar[6],
            'status' => $mostrar[7],
            'data_hora_pedido' => $mostrar[8]
        );
        return $dados;
    }

    public function excluirPedido($idPedido){
        $c = new conectar();
        $conexao = $c -> conexao();
    
        $sql = "DELETE from pedidos WHERE id_pedido = '$idPedido' ";
    
        return mysqli_query($conexao, $sql);
    }
}
?>