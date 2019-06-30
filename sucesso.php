<?php 

include_once "funcoes.php";

function validarCompra($dadosCompras){
    $erros = [];
    if(!$dadosCompras){
        $erros[] = "Não foi recebido nenhum dado para realizar a compra!";
        
    }

    if(!validarNome($dadosCompras['nomeCliente'])){
        $erros[] = "Verifique se seu nome esta correto, e se é maior que 2 caracteres!";
    }
    if(!validarCpf($dadosCompras['cpfCliente'])){
        $erros[] = "CPF inválido, tentar novamente";
    }
    if(!validarCartao($dadosCompras['cartaoCliente'])){
        $erros[] = "numero de cartao invalido";
    }
    if(!validarDataValidade($dadosCompras['dataValidadeCartao'])){
        $erros[] = "Cartão com data vencida!";
    }
    if(!validarCVV($dadosCompras['cvvCartao'])){
        $erros[] = "Numero de CVV inválido";
    }
    return $erros;

}

$errosValidacao = validarCompra($_POST);

?> 

<!DOCTYPE html>
<html lang="pt">
<?php include "head.php"; ?>
<body>
<?php include "header.php"; ?>

    <main class="container">
        <section class="row">
    <?php if(count($errosValidacao) >0): ?>

        <div class="col-md-12">
        
        <ul>
        <?php foreach($errosValidacao as $erro): ?>
        <li><?php echo $erro; ?></li>
            <?php endforeach; ?>    
        
        </ul>

        </div>
        <?php else: ?>

           <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                Olá <?php echo $_POST['nomeCliente']; ?> Parabéns pela sua compra do produto <?php echo $_POST['nomeProduto']; ?>
            </div>
            <?php endif ?>
            <div class="col-md-12">
            <a href="index.php" class="btn btn-primary"> Voltar para home</a>
            </div>

</div>
        </section>

</main>
    
</body>
</html>