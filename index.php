<?php include 'conexao.php'; ?><!DOCTYPE html>
<html lang="pt">

<?php include"head.php";
?>

<body>
  <?php include"header.php"; 

  ?>

  <div class="mt-5"></div>

  <main class="container">
   <section class="row">

    <div class="col-12 col-md-8">
      <div class="row">
        <?php 
        $produtos = Produto::pesquisar();
        ?>
        <?php foreach($produtos as $produto) { ?>
          <div class="col-md-4 mt-3">
            <div class="card">
              <img src="<?php echo $produto->imagem;?>" class="card-img-top img-fluid" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="produto.php?produto=<?php echo $produto->id; ?>"><?php echo $produto->nome;?></a></h5>
                <p class="card-text"><?php echo $produto->descricao;?></p>
                <h4 class="text-success">R$<?php echo $produto->preco;?></h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $produto->id; ?>">Comprar</button>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="jumbotron">
        <h1 class="display-3">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="m-y-md">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
      </div>
    </div>

  </section>
</main>

<!-- Button trigger modal -->


<!-- Modal -->
<?php foreach($produtos as $chave=> $produto): ?>

  <div class="modal fade" id="<?php echo $produto->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Produto:<?php echo $produto->nome;?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">

            <form method="POST"  action="sucesso.php">

              <input type="text" name="nomeProduto" value="<?php echo $produto->nome;?>" hidden>
              <label for="nomeCliente">Nome</label><br>
              <input type="text" name="nomeCliente" placeholder="Nome Completo" >
            </section>
            <div class="form-group">
              <label for="cpfCliente">CPF</label><br>
              <input type="number" name="cpfCliente" placeholder="CPF" >
            </div>
            <div class="form-group">
             <label for="cartaoCliente">Cartão de Crédito</label><br>
             <input type="number" name="cartaoCliente" placeholder="Cartão de Crédito" >
           </div>
           <div class="form-group">
             <label for="dataValidadeCartao">Data de Validade</label><br>
             <input type="date" name="dataValidadeCartao" placeholder="Data de validade do cartão" >
           </div>
           <div class="form-group">
             <label for="cvvCartao">CVV</label><br>
             <input type="number" maxlength="3" name="cvvCartao" placeholder="CVV" >
           </div>

         </div>
         <div class="modal-footer">
          <div class="btn btn-secondary">Preço total:R$<?php echo $produto->preco;?></div>
          <button type="submit" class="btn btn-success">Finalizar compra</button>

        </form>

      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

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