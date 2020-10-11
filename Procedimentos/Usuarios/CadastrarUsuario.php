<?php 
require_once "../../Classes/Conexao.php";
require_once "../../Classes/Usuarios.php";

$obj = new usuarios();

$senha = sha1($_POST['senha']);

$dados = array(
$_POST['usuario'] = strtoupper($_POST['usuario']),
$_POST['nome'] = strtoupper($_POST['nome']),
$_POST['email'] = strtoupper($_POST['email']),
$_POST['grupoSelect'] = strtoupper($_POST['grupoSelect']),
$senha,
$_POST['cpf'] = strtoupper($_POST['cpf']),
$_POST['cnpj'] = strtoupper($_POST['cnpj']),
$_POST['cep'] = strtoupper($_POST['cep']),
$_POST['bairro'] = strtoupper($_POST['bairro']),
$_POST['endereco'] = strtoupper($_POST['endereco']),
$_POST['uf'] = strtoupper($_POST['uf']),
$_POST['numero'] = strtoupper($_POST['numero']),
$_POST['complemento'] = strtoupper($_POST['complemento']),
$_POST['telefone'] = strtoupper($_POST['telefone']),
$_POST['telefone2'] = strtoupper($_POST['telefone2']),
$_POST['celular'] = strtoupper($_POST['celular']),
$_POST['celular2'] = strtoupper($_POST['celular2'])
);

echo $obj-> cadastrarUsuario($dados);
?>