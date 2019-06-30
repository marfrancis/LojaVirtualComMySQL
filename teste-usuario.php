<?php 
include 'conexao.php';
$usuario = new Usuario([
	'nome'=>"Marcelo",
	'email'=>"a@a.com",
	'senha'=>'sss',
	'acesso'=>0
]);

Usuario::cadastrar($usuario);
