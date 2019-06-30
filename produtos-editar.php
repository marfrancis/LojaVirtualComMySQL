<?php include 'conexao.php'; ?><!DOCTYPE html>
<html lang="pt">
<?php include_once "head.php";?>
<body>

</body>

<?php include_once "header.php"; ?>

<?php if (isset($_POST['nomeProduto'])): ?>
    <?php 
    $caminhoImg = $_POST['imagem_atual'];
    if(!empty($_FILES['arquivo']['name'])) {
        $caminhoImg = salvarFotoProduto();
    }
    updateProduto($_POST['id'],$_POST['nomeProduto'],$_POST['descProduto'],$_POST['precoProduto'],$caminhoImg);
    ?>
    <div class="alert alert-success" role="alert">
        Produto atualizado!
    </div>
<?php endif ?>

<?php 

$produto = new Produto();
$produto->id = $_GET['id'];
$produtos = Produto::pesquisarUm($produto);
$produto = $produtos[0];

?>

<main class="container">
    <section class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="jumbotron">

                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $produto->id ?>">
                    <input type="hidden" name="imagem_atual" value="<?php echo $produto->imagem ?>">

                    <div class="form-group">
                        <label for="nomeProduto">Nome do Produto</label>
                        <input value="<?php echo $produto->nome ?>" type="text" name="nomeProduto" class="form-control" id="nomeProduto" placeholder="digite o nome do produto">
                    </div>
                    <div class="form-group">
                        <label for="precoProduto">Preço do Produto</label>
                        <input value="<?php echo $produto->preco ?>" type="number" step="any" name="precoProduto" class="form-control" id="precoProduto" placeholder="Digite o preco">
                    </div>
                    <div class="form-group">
                        <label for="descProduto">Descrição do Produto</label>
                        <textarea name="descProduto" class="form-control" id="descProduto"><?php echo $produto->descricao ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imgProduto">Imagem do Produto</label>
                        <input type="file" name="arquivo">
                    </div>

                    <button class="btn btn-success" type="submit">Finalizar Cadastro</button>
                </form>

            </div>

        </div>
    </section>
</main>


</html>