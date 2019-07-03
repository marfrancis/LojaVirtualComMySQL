<?php

$dsn = "mysql:host=localhost;dbname=lojavirtual;port=3306";
$user = "root";
$pass = "";

try {
	$conexao = new PDO($dsn, $user, $pass);
} catch (PDOException $ex){ 
	echo "<h1>Houve uma falha na conxão</h1>";
	exit;

}

class Produto {

	public $id;
	public $nome;
	public $descricao;
	public $preco;
	public $imagem;

	function __construct($dados = []) {
		$this->id = !empty($dados['id']) ? $dados['id'] : 0;
		$this->nome = !empty($dados['nome']) ? $dados['nome'] : '';
		$this->descricao = !empty($dados['descricao']) ? $dados['descricao'] : '';
		$this->preco = !empty($dados['preco']) ? $dados['preco'] : 0;
		$this->imagem = !empty($dados['imagem']) ? $dados['imagem'] : '';
	}

	public static function pesquisar() {
		global $conexao;
		$statement = $conexao->prepare('SELECT * FROM produto;');
		$statement->execute();
		$colecao = [];
		while( $row = $statement->fetch() ) {
			$dados = [];
			$dados['id'] = $row['id'];
			$dados['nome'] = $row['nome'];
			$dados['descricao'] = $row['descricao'];
			$dados['preco'] = $row['preco'];
			$dados['imagem'] = $row['imagem'];
			$produto = new Produto($dados);
			$colecao[] = $produto;
		}
		return $colecao;
	}

	public static function pesquisarUm($produto) {
		global $conexao;
		$statement = $conexao->prepare('SELECT * FROM produto WHERE id = :id;');
		$statement->execute(['id' => $produto->id]);
		$colecao = [];
		while( $row = $statement->fetch() ) {
			$dados = [];
			$dados['id'] = $row['id'];
			$dados['nome'] = $row['nome'];
			$dados['descricao'] = $row['descricao'];
			$dados['preco'] = $row['preco'];
			$dados['imagem'] = $row['imagem'];
			$produto = new Produto($dados);
			$colecao[] = $produto;
		}
		return $colecao;
	}

	public static function cadastrar($produto) {
		global $conexao;
		$stmt = $conexao->prepare('INSERT INTO produto (id, nome, descricao, preco, imagem) VALUES (NULL, :nome,:descricao,:preco,:imagem)');
		$stmt->execute([
			"nome"=>$produto->nome,
			"descricao"=>$produto->descricao,
			"preco"=>$produto->preco,
			"imagem"=>$produto->imagem,
		]);
	}

	public static function editar($produto) {
		global $conexao;
		$query = $conexao->prepare("
			UPDATE produto SET
			nome = :nome,
			descricao = :descricao,
			preco = :preco,
			imagem = :imagem

			WHERE id = :id;
			");

		$query->execute([
			"id"=>$produto->id,
			"nome"=>$produto->nome,
			"descricao"=>$produto->descricao,
			"preco"=>$produto->preco,
			"imagem"=>$produto->imagem,
		]);
	}

	public static function apagar($produto) {
		global $conexao;
		$query = $conexao->prepare("
			DELETE FROM produto
			WHERE id = :id;
			");

		$query->execute([
			"id" => $produto->id,
		]);
	}

}

class Usuario {

	public $id;
	public $nome;
	public $senha;
	public $email;
	public $acesso;

	function __construct($dados = []) {
		$this->id = !empty($dados['id']) ? $dados['id'] : 0;
		$this->nome = !empty($dados['nome']) ? $dados['nome'] : '';
		$this->senha = !empty($dados['senha']) ? $dados['senha'] : '';
		$this->email = !empty($dados['email']) ? $dados['email'] : '';
		$this->acesso = !empty($dados['acesso']) ? $dados['acesso'] : 0;
	}

	public static function pesquisar() {
		global $conexao;
		$statement = $conexao->prepare('SELECT * FROM usuario;');
		$statement->execute();
		$colecao = [];
		while( $row = $statement->fetch() ) {
			$dados = [];
			$dados['id'] = $row['id'];
			$dados['nome'] = $row['nome'];
			$dados['senha'] = $row['senha'];
			$dados['email'] = $row['email'];
			$dados['acesso'] = $row['acesso'];
			$usuario = new Usuario($dados);
			$colecao[] = $usuario;
		}
		return $colecao;
	}

	public static function pesquisarUm($usuario) {
		global $conexao;
		$statement = $conexao->prepare('SELECT * FROM usuario WHERE id = :id;');
		$statement->execute(['id' => $usuario->id]);
		$colecao = [];
		while( $row = $statement->fetch() ) {
			$dados = [];
			$dados['id'] = $row['id'];
			$dados['nome'] = $row['nome'];
			$dados['senha'] = $row['senha'];
			$dados['email'] = $row['email'];
			$dados['acesso'] = $row['acesso'];
			$usuario = new Usuario($dados);
			$colecao[] = $usuario;
		}
		return $colecao;
	}

	public static function pesquisarPorEmailESenha($usuario) {
		global $conexao;
		$statement = $conexao->prepare('SELECT * FROM usuario WHERE email = :email AND senha = :senha;');
		$statement->execute([
			'email' => $usuario->email,
			'senha' => $usuario->senha,
		]);
		$colecao = [];
		while( $row = $statement->fetch() ) {
			$dados = [];
			$dados['id'] = $row['id'];
			$dados['nome'] = $row['nome'];
			$dados['senha'] = $row['senha'];
			$dados['email'] = $row['email'];
			$dados['acesso'] = $row['acesso'];
			$usuario = new Usuario($dados);
			$colecao[] = $usuario;
		}
		return $colecao;
	}

	public static function cadastrar($usuario) {
		global $conexao;
		$stmt = $conexao->prepare('INSERT INTO usuario (id, nome, senha, email, acesso) VALUES (NULL, :nome,:senha,:email,:acesso)');
		$stmt->execute([
			"nome"=>$usuario->nome,
			"senha"=>$usuario->senha,
			"email"=>$usuario->email,
			"acesso"=>$usuario->acesso,
		]);
	}

	public static function editar($usuario) {
		global $conexao;
		$query = $conexao->prepare("
			UPDATE usuario SET
			nome = :nome,
			senha = :senha,
			email = :email,
			acesso = :acesso

			WHERE id = :id;
			");

		$query->execute([
			"id"=>$usuario->id,
			"nome"=>$usuario->nome,
			"senha"=>$usuario->senha,
			"email"=>$usuario->email,
			"acesso"=>$usuario->acesso,
		]);
	}

	public static function apagar($usuario) {
		global $conexao;
		$query = $conexao->prepare("
			DELETE FROM usuario
			WHERE id = :id;
			");

		$query->execute([
			"id" => $usuario->id,
		]);
	}

}

class Compra {

	public $id;
	public $data;
	public $cartao_numero;
	public $cartao_validade;
	public $cartao_cvv;
	public $usuario_id;
	public $usuario;
	public $produto_id;
	public $produto;

	function __construct($dados = []) {
		$this->id = !empty($dados['id']) ? $dados['id'] : 0;
		$this->data = !empty($dados['data']) ? $dados['data'] : '';
		$this->cartao_numero = !empty($dados['cartao_numero']) ? $dados['cartao_numero'] : '';
		$this->cartao_validade = !empty($dados['cartao_validade']) ? $dados['cartao_validade'] : '';
		$this->cartao_cvv = !empty($dados['cartao_cvv']) ? $dados['cartao_cvv'] : '';
		$this->usuario_id = !empty($dados['usuario_id']) ? $dados['usuario_id'] : '';
		$this->produto_id = !empty($dados['produto_id']) ? $dados['produto_id'] : '';
		if(!empty($this->usuario_id)) { $usuario = new Usuario(); $usuario->id = $this->usuario_id; $usuarios = Usuario::pesquisarUm($usuario); $this->usuario = $usuarios[0]; }
		if(!empty($this->produto_id)) { $produto = new Produto(); $produto->id = $this->produto_id; $produtos = Produto::pesquisarUm($produto); $this->produto = $produtos[0]; }
	}

	public static function pesquisar() {
		global $conexao;
		$statement = $conexao->prepare('SELECT * FROM compra;');
		$statement->execute();
		$colecao = [];
		while( $row = $statement->fetch() ) {
			$dados = [];
			$dados['id'] = $row['id'];
			$dados['data'] = $row['data'];
			$dados['cartao_numero'] = $row['cartao_numero'];
			$dados['cartao_validade'] = $row['cartao_validade'];
			$dados['cartao_cvv'] = $row['cartao_cvv'];
			$dados['usuario_id'] = $row['usuario_id'];
			$dados['produto_id'] = $row['produto_id'];
			$compra = new Compra($dados);
			$colecao[] = $compra;
		}
		return $colecao;
	}

	public static function pesquisarUm($compra) {
		global $conexao;
		$statement = $conexao->prepare('SELECT * FROM compra WHERE id = :id;');
		$statement->execute(['id' => $compra->id]);
		$colecao = [];
		while( $row = $statement->fetch() ) {
			$dados = [];
			$dados['id'] = $row['id'];
			$dados['data'] = $row['data'];
			$dados['cartao_numero'] = $row['cartao_numero'];
			$dados['cartao_validade'] = $row['cartao_validade'];
			$dados['cartao_cvv'] = $row['cartao_cvv'];
			$dados['usuario_id'] = $row['usuario_id'];
			$dados['produto_id'] = $row['produto_id'];
			$compra = new Compra($dados);
			$colecao[] = $compra;
		}
		return $colecao;
	}

	public static function cadastrar($compra) {
		global $conexao;
		$stmt = $conexao->prepare('INSERT INTO compra (id, data, cartao_numero, cartao_validade, cartao_cvv, usuario_id, produto_id) VALUES (NULL, :data, :cartao_numero, :cartao_validade, :cartao_cvv, :usuario_id, :produto_id)');
		$stmt->execute([
			"data"=>$compra->data,
			"cartao_numero"=>$compra->cartao_numero,
			"cartao_validade"=>$compra->cartao_validade,
			"cartao_cvv"=>$compra->cartao_cvv,
			"usuario_id"=>$compra->usuario_id,
			"produto_id"=>$compra->produto_id,
		]);
	}

	public static function editar($compra) {
		global $conexao;
		$query = $conexao->prepare("
			UPDATE compra SET
			data = :data,
			cartao_numero = :cartao_numero,
			cartao_validade = :cartao_validade,
			cartao_cvv = :cartao_cvv,
			usuario_id = :usuario_id,
			produto_id = :produto_id

			WHERE id = :id;
			");

		$query->execute([
			"id"=>$compra->id,
			"data"=>$compra->data,
			"cartao_numero"=>$compra->cartao_numero,
			"cartao_validade"=>$compra->cartao_validade,
			"cartao_cvv"=>$compra->cartao_cvv,
			"usuario_id"=>$compra->usuario_id,
			"produto_id"=>$compra->produto_id,
		]);
	}

	public static function apagar($compra) {
		global $conexao;
		$query = $conexao->prepare("
			DELETE FROM compra
			WHERE id = :id;
			");

		$query->execute([
			"id" => $compra->id,
		]);
	}

}