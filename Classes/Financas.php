<?php 
class financas{
    public function cadastrarFinanca($dados) {
        $c = new conectar();
        $conexao = $c -> conexao();

        $idUsuario = $_SESSION['IDUser'];
        date_default_timezone_set('America/Sao_Paulo');
        $dataHora = date('Y-m-d H:i:s');

        $sql = "INSERT into financas (id_usuario, descricao, tipo_financa, valor, data_hora) 
        VALUES ('$idUsuario','$dados[0]', '$dados[1]','$dados[2]', '$dataHora')";
        
        return mysqli_query($conexao, $sql);
    }

    public function abrirCaixa($dados) {
        $c = new conectar();
        $conexao = $c -> conexao();

        $idUsuario = $_SESSION['IDUser'];

        $sql = "INSERT into fluxo_caixa (id_usuario_entrada, qtd_notas_entrada, valor_total_notas_entrada, qtd_moedas_entrada, 
        valor_total_moedas_entrada, data_referencia, valor_total_inicial, status, taxa_dia) 
        VALUES ('$idUsuario','$dados[0]', '$dados[1]','$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', 'ABERTO', '$dados[6]')";
        
        return mysqli_query($conexao, $sql);
    }

    public function fecharCaixa($dados) {
        $c = new conectar();
        $conexao = $c -> conexao();

        $idUsuario = $_SESSION['IDUser'];

        $sql = "UPDATE fluxo_caixa 
        SET qtd_notas_saida = '$dados[0]', valor_total_notas_saida = '$dados[1]', qtd_moedas_saida = '$dados[2]', 
        valor_total_moedas_saida = '$dados[3]', valor_total_final = '$dados[5]', id_usuario_saida = '$idUsuario', status = 'FECHADO'
        WHERE data_referencia = '$dados[4]'";
        
        return mysqli_query($conexao, $sql);
    }

    public function verificarStatusCaixa($data) {
        $c = new conectar();
        $conexao = $c -> conexao();

        $sql = "SELECT status 
        FROM fluxo_caixa 
        WHERE data_referencia = '$data'";
        
        $result = mysqli_query($conexao, $sql);
        $mostrar = mysqli_fetch_row($result);

        return $mostrar[0];
    }
}
?>