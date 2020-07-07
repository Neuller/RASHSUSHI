<?php 
session_start();
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Clientes.php";

$idusuario = $_SESSION['IDUser'];
$obj = new clientes();

//$senha = sha1($_POST['senha']);

$dados = array(
$idusuario,
$_POST['nome'] = strtoupper($_POST['nome']),		
$_POST['cpf'] = strtoupper($_POST['cpf']),
$_POST['cnpj'] = strtoupper($_POST['cnpj']),
$_POST['cep'] = strtoupper($_POST['cep']),
$_POST['bairro'] = strtoupper($_POST['bairro']),
$_POST['endereco'] = strtoupper($_POST['endereco']),
$_POST['numero'] = strtoupper($_POST['numero']),		
$_POST['complemento'] = strtoupper($_POST['complemento']),	
$_POST['telefone'] = strtoupper($_POST['telefone']),	
$_POST['celular'] = strtoupper($_POST['celular']),	
$_POST['email'] = strtoupper($_POST['email'])	
//$senha
);

echo $obj-> adicionarCliente($dados);
?>