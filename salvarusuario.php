<?php 

include_once "funcoes.php";

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

$nomeUsuario = $_POST['nomeUsuario'];
$emailUsuario = $_POST['emailUsuario'];
$senhaUsuario = password_hash($_POST['senhaUsuario'],PASSWORD_DEFAULT);
$nivelUsuario = $_POST['nivelUsuario'];


if(addUsuario($nomeUsuario, $emailUsuario, $senhaUsuario, $nivelUsuario)){
    echo '<h1>Usuario cadastrado com sucesso</h1>';
    echo '<a class="btn btn-primary" href="login.php"> Ir para pagina de login!';
} else {
    echo '<h1>Informações possuem algum erro, tente novamente!!</h1>';
    echo '<a class="btn btn-primary" href="cadastrousuario.php"> Voltar para pagina de cadastro!';

}

