<?php 
session_start();

function logarUsuario($nome, $nivelAcesso){
    $usuario = ["logado"=>true,'nome'=>$nome, "nivelAcesso"=> $nivelAcesso];

    $_SESSION['usuario'] = $usuario;
    

}

function addProduto($nome,$descricao,$preco,$img){
    $produto = new Produto([
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'imagem' => $img,
    ]);
    Produto::cadastrar($produto);
}

function updateProduto($id,$nome,$descricao,$preco,$img){
    $produto = new Produto([
        'id' => $id,
        'nome' => $nome,
        'descricao' => $descricao,
        'preco' => $preco,
        'imagem' => $img,
    ]);
    Produto::editar($produto);
}

function saveProdutosInJson() {
    global $produtos;
    $jsonProdutos = json_encode(['Produtos' => $produtos]);
    file_put_contents('Produtos.json', $jsonProdutos);
}

function validarNome($nome){
    return $nome != "" && strlen($nome) >=3;

}

function validarCpf($cpf){
    return strlen($cpf) == 11;
}


function validarCartao($cartaoCliente){
    return  strlen($cartaoCliente) == 16;
}


function validarDataValidade($dataValidade){
    return $dataValidade > date('Y-m-d');
}

function validarCVV($cvv){
    return  strlen($cvv) == 3;
}

function addUsuario($nomeUsuario,$emailUsuario,$senhaUsuario,$niveldeAcesso){

    $jsonUsuarios = file_exists("usuarios.json")? file_get_contents('usuarios.json'):"";
    $usuarios = json_decode($jsonUsuarios, true);
    
    $itensusuarios = is_array($usuarios['usuarios'])?count($usuarios['usuarios']):0;
    $chave = $itensusuarios + 1; // pergunta quantos itens tem no array
    $novoUsuario=["id"=>"usuario$chave",'nomeUsuario'=>$nomeUsuario,'email'=>$emailUsuario,'senha'=>$senhaUsuario,'niveldeAcesso'=>$niveldeAcesso];



    $usuarios["usuarios"][]=$novoUsuario;
    $jsonUsuarios = json_encode($usuarios);
    
    return file_put_contents('usuarios.json', $jsonUsuarios);
}

function salvarFotoProduto() {
    if( empty($_FILES['arquivo']['tmp_name']) ) {
        die('Faltou enviar a foto do produto');
    }
    $imgAceitas = ["image/png","image/jpg","img/jpeg","image/jpeg"];
    $erroEnvio = $_FILES['arquivo']['error'];

    $nomeArquivo = $_FILES['arquivo']['name'];
    $arquivoTmp = $_FILES['arquivo']['tmp_name'];
    $caminhoImg = "img/$nomeArquivo";
    $typeFile = $_FILES['arquivo']['type'];

    if($erroEnvio !== 0){
        echo "<h1>Houve um erro no envio do arquivo, verifique e tente novamente!</h1>";
        echo '<a class="btn btn-primary" href="cadastroProduto.php">Voltar para página de cadastro!</a>';
        exit;
    }

    if(array_search($typeFile, $imgAceitas) === false ) {
        echo "<h1>Extensão do arquivo invalida, verifique se o arquivo é uma imagem do tipo png, jpg ou jpeg!</h1>";
        echo '<a class="btn btn-primary" href="cadastroProduto.php">Voltar para página de cadastro!</a>';
        exit;
    }

    move_uploaded_file($arquivoTmp, $caminhoImg);
    return $caminhoImg;
}