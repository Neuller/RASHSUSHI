<?php 
class pedidos {
    public function cadastrarPedido($dados){
        $c = new conectar();
        $conexao = $c -> conexao();

        date_default_timezone_set('America/Sao_Paulo');
        $dataHora = date('Y-m-d H:i:s');
        $data = date('Y-m-d');
        $idPedido = self::criarComprovante();
        $dadosTabela = $_SESSION['tabelaTemporaria'];
        $idUsuario = $_SESSION['IDUser'];
        $enderecoEntrega = $dados[0];
        $troco = $dados[1];
        $valorPagamento = $dados[2];
        $formaPagamento = $dados[3];
        $idEntregador = $dados[4];
        $realizarEntrega = $dados[5];
        $taxaEntregador = $dados[6];
        $r = 0;

        for ($i = 0; $i < count($dadosTabela) ; $i++) { 
            $d = explode("||", $dadosTabela[$i]);

            $sql = "INSERT INTO pedidos (id_pedido, id_cliente, id_produto, id_usuario, id_entregador, descricao, quantidade_itens, 
            valor_total, status, data_hora_pedido, endereco_entrega, troco, valor_pagamento, forma_pagamento, data, realizar_entrega, taxa_entrega)
            VALUES ('$idPedido', '$d[6]', '$d[0]', '$idUsuario', '$idEntregador','$d[1]', '$d[4]', '$d[5]', 'EM ABERTO', '$dataHora', '$enderecoEntrega', 
            '$troco', '$valorPagamento', '$formaPagamento', '$data', '$realizarEntrega', '$taxaEntregador')";

            $r = $r + $result = mysqli_query($conexao, $sql);
        }

        $sql = "SELECT max(id_pedido) FROM pedidos";

        $result = mysqli_query($conexao, $sql);
        $ultimoPedido = mysqli_fetch_row($result)[0];

        return $ultimoPedido;
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
    
        $sql = "SELECT id_pedido, id_cliente, id_produto, id_usuario, descricao, quantidade_itens, valor_total, status, data_hora_pedido, endereco_entrega
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
            'data_hora_pedido' => $mostrar[8],
            'endereco_entrega' => $mostrar[9]
        );
        return $dados;
    }

    public function excluirPedido($idPedido){
        $c = new conectar();
        $conexao = $c -> conexao();
    
        $sql = "DELETE from pedidos WHERE id_pedido = '$idPedido' ";
    
        return mysqli_query($conexao, $sql);
    }
    public function cancelarPedido($idPedido){
        $c = new conectar();
        $conexao = $c -> conexao();
    
        $sql = "UPDATE pedidos SET status = 'CANCELADO' WHERE id_pedido = '$idPedido' ";
    
        return mysqli_query($conexao, $sql);
    }
}
?>