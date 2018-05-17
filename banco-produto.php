<?php

require_once("class/Produto.php");
require_once("class/Categoria.php");

function listaProdutos($conexao) {

	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from 
			produtos as p join categorias as c on c.id=p.categoria_id");

	while($produto_array = mysqli_fetch_assoc($resultado)) {

		$produto = new Produto();
		$categoria = new Categoria();
		$categoria->nome = $produto_array["categoria_nome"];

		$produto->id = $produto_array["id"];
		$produto->nome = $produto_array["nome"];
		$produto->preco = $produto_array["preco"];
        $produto->descricao = $produto_array["descricao"];
        $produto->categoria = $categoria;
        $produto->usado = $produto_array["usado"];


		array_push($produtos, $produto);
	}

	return $produtos;
}

function insereProduto($conexao, Produto $produto) {

	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) 
		values ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria}, {$produto->usado})";

	return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, Produto $produto) {

	$query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, 
		descricao = '{$produto->descricao}', categoria_id = {$produto->categoria->id}, 
			usado = {$produto->usado} where id = '{$produto->id}'";

	return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
	$produtos = array();
	$query = "select * from produtos where id = {$id}";

	$resultado = mysqli_query($conexao, $query);
	while($produto_array = mysqli_fetch_array($resultado)){

	
		$produto = new Produto();
		$categoria = new Categoria();
		$categoria->nome = $produto_array["categoria_nome"];

		$produto->id = $produto_array["id"];
		$produto->nome = $produto_array["nome"];
		$produto->preco = $produto_array["preco"];
        $produto->descricao = $produto_array["descricao"];
        $produto->categoria = $categoria;
        $produto->usado = $produto_array["usado"];
	}
		return $produto;
	
}

function removeProduto($conexao, $id) {

	$query = "delete from produtos where id = {$id}";

	return mysqli_query($conexao, $query);
}