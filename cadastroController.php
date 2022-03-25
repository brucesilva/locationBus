<?php

require('cadastroModel.php');
require('cadastraFormularioModel.php');
require('config.php');

//pegando dados dá página de cadastro
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$formulario = new cadastroModel();
$formulario->__set('nome', $nome);
$formulario->__set('email', $email);
$formulario->__set('telefone', $telefone);
$formulario->__set('senha', $senha);

$formulario->__get('nome');

$enviaFormulario = new cadastraFormularioModel($conexao);
$enviaFormulario->insereFormulario($formulario);
//$enviaFormulario->verificaEmail($formulario);
 

//encapsulando os dados na classe cadastroModel
