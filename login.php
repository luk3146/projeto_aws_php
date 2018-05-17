<?php 

require_once ("banco-usuario.php");
require_once("logica-usuario.php");

if($_POST["acesso"] == "logar"){

	$usuario = buscaUsuario($conexao, $_POST["identificador"], $_POST["senha"]);
	direciona($usuario);
}

if($_POST["acesso"] == "cadastrar"){
	$usuario = cadastraUsuario($conexao, $_POST["nome"], $_POST["mackenzista"], $_POST["identificador"], $_POST["senha"]);

	if($usuario == "") {
		$_SESSION["danger"] = "Usuário ou senha inválido.";
		header("Location: index.php");
	} else {


		$_SESSION["success"] = $_POST["nome"]." logado com sucesso <br> seja bem vindo!";
		$_SESSION["logou"] = $_POST["nome"]." logado com sucesso <br> seja bem vindo!";
		logaUsuario($_POST["nome"]);
		header("Location: index.php");
	}
}

if($_POST["acesso"] == "adm"){
	
	$usuario = buscaUsuario($conexao, $_POST["identificador"], $_POST["senha"]);
	direciona_adm($usuario);
	
}