<?php 


include_once "funcoes.php";

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

$usuarios = file_exists('usuarios.json')?file_get_contents('usuarios.json'):"";
$usuarios = json_decode($usuarios,true);

$email = $_POST['emailUsuario'];
$senha = $_POST['senhaUsuario'];

foreach($usuarios['usuarios']as $key => $usuario){

    if($usuario['email']== $email){
        $usuarioExiste = $usuarios['usuarios'][$key];
        break;

    }

}

if(isset($usuarioExiste) && password_verify($senha,$usuarioExiste['senha'])){
    logarUsuario($usuarioExiste['nomeUsuario'], $usuarioExiste['nivelAcesso']);
    header('location:index.php');

} else {
        echo"Email ou senha inválida, tente novamente!";
        echo '<a class="btn btn-primary" href="login.php">Voltar para pagina de login!</a>';

}   