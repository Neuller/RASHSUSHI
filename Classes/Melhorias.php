<?php 
class melhorias{
    public function cadastrarMelhoria($dados){
        $c = new conectar();
        $conexao = $c -> conexao();

        $idUsuario = $_SESSION['IDUser'];
        date_default_timezone_set('America/Sao_Paulo');
        $dataHora = date('Y-m-d H:i:s');

        $sql = "INSERT into melhorias (id_usuario, descricao, data_hora)
        VALUES ('$idUsuario','$dados[0]', '$dataHora')";
        
        return mysqli_query($conexao, $sql);
    }
}
?>