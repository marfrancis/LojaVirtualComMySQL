<?php 

include_once "funcoes.php";
include_once "conexao.php";

$contadorImputVazio = 0;

foreach($_POST as $item) {
	$item == "" ?$contadorImputVazio++:0;
}

$itensPost = is_array(($_POST))?count($_POST):0;
if($contadorImputVazio == $itensPost)  {
	echo "<h1>Você não enviou nenhuma informação sobre o produto</h1>";
	echo '<a class="btn btn-primary" href="cadastrousuario.php">Cadastro Usuário!</a>';
	exit;
}

$usuario = new Usuario();
$usuario->nome = $_POST['nomeUsuario'];
$usuario->email = $_POST['emailUsuario'];
$usuario->senha = $_POST['senhaUsuario'];
// $usuario->senha = password_hash($_POST['senhaUsuario'],PASSWORD_DEFAULT);
$usuario->nivel = $_POST['nivelUsuario'];
Usuario::cadastrar($usuario);

echo '<h1>Usuario cadastrado com sucesso</h1>';
echo '<a class="btn btn-primary" href="login.php"> Ir para pagina de login!';
