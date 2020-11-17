<?php 
class financas{
    public function cadastrarFinanca($dados){
        $c = new conectar();
        $conexao = $c -> conexao();

        $idUsuario = $_SESSION['IDUser'];
        date_default_timezone_set('America/Sao_Paulo');
        $dataHora = date('Y-m-d H:i:s');

        $sql = "INSERT into financas (id_usuario, descricao, tipo_financa, valor, data_hora) 
        VALUES ('$idUsuario','$dados[0]', '$dados[1]','$dados[2]', '$dataHora')";
        
        return mysqli_query($conexao, $sql);
    }
}
?>