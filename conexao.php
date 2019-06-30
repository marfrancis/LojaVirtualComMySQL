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
			$produto = new Produto($dados);
			$colecao[] = $produto;
		}
		return $colecao;
	}

	public static function pesquisarUm($produto) {
		global $conexao;
		$statement = $conexao->prepare('SELECT * FROM usuario WHERE id = :id;');
		$statement->execute(['id' => $produto->id]);
		$colecao = [];
		while( $row = $statement->fetch() ) {
			$dados = [];
			$dados['id'] = $row['id'];
			$dados['nome'] = $row['nome'];
			$dados['senha'] = $row['senha'];
			$dados['email'] = $row['email'];
			$dados['acesso'] = $row['acesso'];
			$produto = new Produto($dados);
			$colecao[] = $produto;
		}
		return $colecao;
	}

	public static function cadastrar($produto) {
		global $conexao;
		$stmt = $conexao->prepare('INSERT INTO usuario (id, nome, senha, email, acesso) VALUES (NULL, :nome,:senha,:email,:acesso)');
		$stmt->execute([
			"nome"=>$produto->nome,
			"senha"=>$produto->senha,
			"email"=>$produto->email,
			"acesso"=>$produto->acesso,
		]);
	}

	public static function editar($produto) {
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
			"id"=>$produto->id,
			"nome"=>$produto->nome,
			"senha"=>$produto->senha,
			"email"=>$produto->email,
			"acesso"=>$produto->acesso,
		]);
	}

	public static function apagar($produto) {
		global $conexao;
		$query = $conexao->prepare("
			DELETE FROM usuario
			WHERE id = :id;
			");

		$query->execute([
			"id" => $produto->id,
		]);
	}

}