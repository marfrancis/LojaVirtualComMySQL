<?php 
include 'ler-json.php';
?>

<h3><?php echo $produtos[$_GET['id']]['nome'] ?></h3>
<p><?php echo $produtos[$_GET['id']]['preco'] ?></p>
<p><?php echo $produtos[$_GET['id']]['descricao'] ?></p>
<p><img src="<?php echo $produtos[$_GET['id']]['img'] ?>" alt=""></p>
<hr>
