<?php include_once 'conexao.php'; ?><!DOCTYPE html>
<html lang="pt">
<?php include_once "head.php";?>
<body>
    
</body>

<?php include_once "header.php";?>

<main class="container">
    <section class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="jumbotron">
                <form action="salvarproduto.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" name="nomeProduto" class="form-control" id="nomeProduto" placeholder="digite o nome do produto">
                </div>
                <div class="form-group">
                    <label for="precoProduto">Preço do Produto</label>
                    <input type="number" step="any" name="precoProduto" class="form-control" id="precoProduto" placeholder="Digite o preco">
                </div>
                <div class="form-group">
                    <label for="descProduto">Descrição do Produto</label>
                    <textarea name="descProduto" class="form-control" id="descProduto"></textarea>
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