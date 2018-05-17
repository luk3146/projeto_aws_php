<?php

require_once("class/Lanchonete.php");


function listaLanchonetes($conexao) {

	$lanchonetes = array();
	$resultado = mysqli_query($conexao,"select * from lanchonetes");

	while($lanchonete_array = mysqli_fetch_assoc($resultado)) {

		$lanchonete = new Lanchonete(
										$lanchonete_array["id_lanchonete"],
										$lanchonete_array["nome"],
									 	$lanchonete_array["descricao"],
									 	$lanchonete_array["cupom"]
									);

		array_push($lanchonetes,$lanchonete);
	}

	return $lanchonetes;
}

function listaLanchonete($conexao,$id) {

	$lanchonetes = array();
	$resultado = mysqli_query($conexao, "select * from lanchonetes where id_lanchonete = '".$id."'");
	
	while($lanchonete_array = mysqli_fetch_assoc($resultado)) {

		$lanchonete = new Lanchonete(
										$lanchonete_array["id_lanchonete"],
										$lanchonete_array["nome"],
									 	$lanchonete_array["descricao"],
									 	$lanchonete_array["cupom"]
									);

		array_push($lanchonetes,$lanchonete);
	}

	return $lanchonetes;
}

function insereLanchonete($conexao, Lanchonete $lanchonete) {

	$query = "insert into lanchonetes (id_lanchonete, nome, descricao, cupom) 
		values ({$lanchonete->getId_lanchonete()}, '{$lanchonete->getNome()}', '{$lanchonete->getDescricao()}', {$lanchonete->getCupom()})";

	return mysqli_query($conexao, $query);
}

function alteraLanchonete($conexao, Lanchonete $lanchonete) {


	$update_loja = $lanchonete;

	$lanchonete->setNome($update_loja->getNome());
	$lanchonete->setDescricao($update_loja->getDescricao());
	$lanchonete->setCupom($update_loja->getCupom());


	$query = "update lanchonetes set 
			nome = '{$lanchonete->getNome()}', 
			descricao = '{$lanchonete->getDescricao()}', 
			cupom = '{$lanchonete->getCupom()}' where id_lanchonete = '{$lanchonete->getId_lanchonete()}'";
			

	return mysqli_query($conexao, $query);
}




function insereCupon($conexao, Lanchonete $lanchonete) {


	$update_loja = $lanchonete;
	
	$lanchonete->setNome($update_loja->getNome());
	$lanchonete->setDescricao($update_loja->getDescricao());
	$lanchonete->setCupom($update_loja->getCupom());
	
	$query = "update lanchonetes set 
			cupom = '{$lanchonete->getCupom()}' where id_lanchonete = '{$lanchonete->getId_lanchonete()}'";
			

	return mysqli_query($conexao, $query);
}



function buscaLanchonete($conexao, $id) {
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

function removeLanchonete($conexao, $id) {

	$query = "delete from lanchonetes where id_lanchonete = {$id}";

	return mysqli_query($conexao, $query);
}