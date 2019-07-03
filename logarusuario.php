<?php 
include_once "funcoes.php";
include_once "conexao.php";

@session_start();

$contadorImputVazio = 0;

foreach($_POST as $item) {
	$item == "" ?$contadorImputVazio++:0;
}

$itensPost = is_array(($_POST))?count($_POST):0;
if($contadorImputVazio == $itensPost)  {
	echo "<h1>Você não enviou nenhuma informação sobre o login</h1>";
	echo '<a class="btn btn-primary" href="login.php">Voltar para página de login</a>';
	exit;
}

$usuario = new Usuario();
$usuario->email = $_POST['emailUsuario'];
$usuario->senha = $_POST['senhaUsuario'];
// $usuario->senha = password_hash($_POST['senhaUsuario'],PASSWORD_DEFAULT);
$usuarios = Usuario::pesquisarPorEmailESenha($usuario);

if(sizeof($usuarios)) {
	$usuario = $usuarios[0];
	$_SESSION['usuario'] = $usuario->id;
	header("location: ./");
	exit;
} else {
	?><pre><?php print_r([$usuario,Usuario::pesquisar()]) ?></pre><?php
	echo"Email ou senha inválida, tente novamente!";
	echo '<a class="btn btn-primary" href="login.php">Voltar para pagina de login!</a>';
}   