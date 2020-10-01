<?php
require_once "../../Classes/Conexao.php";

if(isset($_POST['CPF'])){
    $cpfPostado = $_POST['CPF'];

    if($cpfPostado == "000.000.000-00"){
        echo json_encode("CPF NAO CADASTRADO");
    }else{
        $c = new conectar();
        $conexao = $c->conexao();
        $sql = "SELECT * FROM clientes WHERE CPF = '{$cpfPostado}'";

        $result = mysqli_query($conexao, $sql) or print mysql_error();

        if(mysqli_num_rows($result) > 0){
            echo json_encode("CPF JA CADASTRADO");
        }else{ 
            echo json_encode("CPF NAO CADASTRADO"); 
        }
    }
}
?>