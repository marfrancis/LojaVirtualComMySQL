<?php 

include 'ler-json.php';

if(isset($_GET['id']) && isset($produtos[$_GET['id']])) {
    // Se existe esse produto na sessão então remove essa posição do array
  unset($produtos[$_GET['id']]);
    // Depois grava a sessão no json que é o arquivo
  saveProdutosInJson();
}

header("location: ./");
