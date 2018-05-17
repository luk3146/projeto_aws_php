<?php


session_start();

function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
}
function admEstaLogado() {
	return isset($_SESSION["adm_logado"]);
}

function verificaUsuario() {
	if(!usuarioEstaLogado()) {
		header("Location: index.php");
	}
}

function verificaAdm() {
	if(!admEstaLogado()) {
		$_SESSION["danger"] = "Você não possui acesso ou não está logado!.";
		header("Location: index.php");
	}
}

function usuarioLogado() {
	return $_SESSION["usuario_logado"];
}

function logaUsuario($nome) {
	$_SESSION["usuario_logado"] = $nome;
}
function logaUsuario_adm($nome) {
	$_SESSION["adm_logado"] = $nome;
}

function logout() {
	$_SESSION["success"] = "Deslogado com Sucesso.";
	session_destroy();
	session_start();
}

function sem_sessao(){
	echo "<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
		<b class='dropdown-item' href='#' data-toggle='tooltip' data-placement='right' title='Realize o cadastro ou acesse para obter mais informações.'><i class='material-icons'>vpn_key</i> - Oh ou!</b></div>";
	}
function direciona($usuario){
	if($usuario == null) {
		$_SESSION["danger"] = "Usuário ou senha inválido.";
		header("Location: index.php");
	} else {
		
		$_SESSION["success"] = $usuario["nome"]." logado com sucesso <br> seja bem vindo!";
		logaUsuario($usuario["nome"]);
		header("Location: index.php");
	}
}

function direciona_adm($usuario){
	if($usuario["adm"] == "nao" or $usuario["adm"] == "") {
		$_SESSION["danger"] = "Acesso Não Permitido!.";
		header("Location: index.php");
	} else if($usuario["adm"] == "sim") {
		$_SESSION["success"] = $usuario["nome"]."<br> Logado com sucesso!";
		logaUsuario_adm($_SESSION["adm_logado"]);
		$_SESSION["adm_logado"] = $usuario["nome"];
		$_SESSION["identificador"] = $usuario["identificador"];
		header("Location: gestao.php");
	}
}

