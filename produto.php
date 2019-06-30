<?php include_once 'conexao.php'; ?><!DOCTYPE html>
<html lang="pt">

<?php include"head.php";
?>

<body>
	<?php include"header.php"; 
		?>

	<?php 
	$produto = new Produto(['id'=>$_GET['produto']]);
	$produtos = Produto::pesquisarUm($produto);
	if(sizeof($produtos) != 1) die("Resultado não encontrado");
	$produto = $produtos[0];
	?>
	
	<div class="container">
		<div class="jumbotron">
			<div class="row">
				<div class="col-12">
					<!-- Aqui temos um botão com um código JavaScript que muda o endereço do navegador para index.php -->
					<button onclick="window.location='index.php'" class="btn btn-info">👈 Voltar pra lista de produtos</button>
				</div>
			</div>
			<div class="mb-4"></div>

			<!-- Imprimimos na tela as informações do produto e sua foto -->

			<div class="row">
				<div class="col-5">
					<img class="img-fluid" src="<?php echo $produto->imagem ?>" />
				</div>
				<div class="col-7">
					<h1><?php echo $produto->nome ?></h1>
					<p>Descrição</p>
					<h5><?php echo $produto->descricao ?></h5>
					<p>Preço</p>
					<h5><?php echo $produto->preco ?></h5>
				</div>

			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</body>

</html>