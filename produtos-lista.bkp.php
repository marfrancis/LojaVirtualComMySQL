<?php include 'ler-json.php'; ?><!DOCTYPE html>
<html lang="pt">

<?php include"head.php";
?>

<body>
  <?php include"header.php"; 

  ?>

  <div class="mb-3"></div>

  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if (isset($produtos)): ?>
          <?php foreach ($produtos as $key => $produto): ?>
            <tr>
              <td><?php echo $key ?></td>
              <td><a href="produto.php?produto=<?php echo $key ?>"><?php echo $produto['nome'] ?></a></td>
              <td><?php echo $produto['preco'] ?></td>
              <td>
                <a href="./produtos-editar.php?id=<?php echo $key ?>">Editar</a>
                <a href="./produtos-apagar.php?id=<?php echo $key ?>">Apagar</a>
              </td>
            </tr>
          <?php endforeach ?>
        <?php endif ?>
      </tbody>
    </table>
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