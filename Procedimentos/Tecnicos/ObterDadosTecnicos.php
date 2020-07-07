<?php

session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Tecnicos.php";

$obj = new tecnicos();

echo json_encode($obj->obterDadosTecnicos($_POST['idTecnicos']));
?>