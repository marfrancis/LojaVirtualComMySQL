<?php include 'ler-json.php'; ?><!DOCTYPE html>
<html lang="pt">
<head>
    <?php include_once "head.php"; ?>
</head>
<body>
    <?php include_once"header.php"; ?>

    <div class="container">

    <div class="col-5 mt-5 mx-auto">
        <div class="jumbotron  ">
        <form action="salvarusuario.php" method="post" enctype="multipart/form-data">
            <h1>Cadastro de Usuário</h1>
  <div class="form-group">
    <label for="nomeUsuario">Nome do Usuario</label>
    <input type="text" name="nomeUsuario" class="form-control" id="nomeUsuario" placeholder="digite o nome do usuario">
    </div>
  <div class="form-group">
    <label for="emailUsuario">Email</label>
    <input type="email" step="any" name="emailUsuario" class="form-control" id="emailUsuario" placeholder="Digite o email">
  </div>
  <div class="form-group">
    <label for="senhaUsuario">Senha</label>
    <input type="password" name="senhaUsuario" class="form-control" id="senhaUsuario" placeholder="Digite a senha"></input>
    </div>
    <div class="form-group">
    <label for="nivelUsuario">Nivel de acesso</label>
        <select name="nivelUsuario" id="nivelUsuario">
        <option value="0">Administrador</option>
        <option value="1">Usuário</option>
    
    </select>
    </div>
    
    <button class="btn btn-success" type="submit">Finalizar Cadastro</button>
 
</form>
        </div>
    </div>

    
    </div>
</body>
</html>