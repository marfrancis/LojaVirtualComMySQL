<?php 

include_once "funcoes.php";
include_once "conexao.php";

@session_start();
if( empty($_SESSION['usuario']) ) {
    header("location: ./");
    exit;
}

function validarCompra($dadosCompras){
    $erros = [];

    if(!$dadosCompras){
        $erros[] = "Não foi recebido nenhum dado para realizar a compra!";
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
$compra = null;

if(sizeof($errosValidacao) == 0) {
    $compra = new Compra([
        'data' => date("Y-m-d H:i:s"),
        'produto_id' => $_POST['produto_id'],
        'usuario_id' => $_SESSION['usuario'],
        'cartao_numero' => $_POST['cartaoCliente'],
        'cartao_validade' => $_POST['dataValidadeCartao'],
        'cartao_cvv' => $_POST['cvvCartao'],
    ]);
    Compra::cadastrar($compra);
}

?><!DOCTYPE html>
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
                        Olá <?php echo $compra->usuario->nome; ?> Parabéns pela sua compra do produto <?php echo $compra->produto->nome; ?>
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