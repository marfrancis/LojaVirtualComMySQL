<?php 
include_once "funcoes.php";

$usuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:"";

// $usuario = [];

$jsonProdutos = file_get_contents('Produtos.json');
$produtos = json_decode($jsonProdutos, true);
$produtos = $produtos['Produtos'];

// addProduto("Curso Mobile Android","Curso para criar um app",2300,"img/prod1.jpg")

