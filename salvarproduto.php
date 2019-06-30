<?php

include_once "funcoes.php";
include_once "conexao.php";

$contadorImputVazio = 0;

foreach($_POST as $item) {
	$item == "" ?$contadorImputVazio++:0;
}

if($contadorImputVazio == count($_POST))  {

	echo "<h1>Você não enviou nenhuma informação sobre o produto</h1>";
	echo '<a class="btn btn-primary" href="cadastroProduto.php">Voltar para página de cadastro!</a>';
	exit;

}

$caminhoImg = salvarFotoProduto();
addProduto($_POST['nomeProduto'],$_POST['descProduto'],$_POST['precoProduto'],$caminhoImg);
header("location: ./");
