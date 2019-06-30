<?php 
include 'ler-json.php';
?>

<?php foreach ($produtos as $key => $produto): ?>
	<h3><?php echo $produto['nome'] ?></h3>
	<p><a href="teste-abrir.php?id=<?php echo $key ?>">Abrir</a></p>
	<hr>
<?php endforeach ?>