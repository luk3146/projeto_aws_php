<?php
require_once("conecta.php");

function buscaUsuario($conexao, $identificador, $senha) {

	$senhaMd5 = md5($senha);
	$email = mysqli_real_escape_string($conexao, $identificador);
	$query = "select * from usuarios where identificador='{$identificador}' and senha='{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);

	return $usuario;
}


function listaUsuarios($conexao) {
	$usuarios = array();
	$query = "select * from usuarios";
	$resultado = mysqli_query($conexao, $query);
	while($usuario = mysqli_fetch_assoc($resultado)){

		array_push($usuarios, $usuario);

	}

	return $usuarios;
}


function acessos($conexao, $identificador, $acessos) {

	date_default_timezone_set('UTC');
	$data = date("Y-m-d H:i:s"); 


	if($_POST["tipo_mackenzista"] == "sim"){
		$acao = "Deu Acesso a.";
		$_SESSION["success"] = "Acesso Concedido";
	} else {
		$acao = "Tirou Acesso de.";
		$_SESSION["success"] = "Acesso Retirado";
	}

	$query_log = "insert into log_usuarios_admin (nome_admin, identificador_admin, 
				realizou, nome_usuario_admin, identificador_usuario_admin, data_horario)
				value ('{$_SESSION["adm_logado"]}','{$_SESSION["identificador"]}', 
				'{$acao}', '{$_POST["identificador"]}','{$_POST["nome"]}', '{$data}')";
	mysqli_query($conexao, $query_log);

	$query = "update usuarios set adm = '{$acessos}' where identificador = {$identificador}";
	$liberaAcesso = mysqli_query($conexao, $query);
	return $liberaAcesso;
}


function historico($conexao) {

	$query = "select * from log_usuarios_admin";
	$log = mysqli_query($conexao, $query);
	return $log;

}

function cadastraUsuario($conexao, $nome, $tipo_mackenzista, $identificador, $senha) {

	$senhaMd5 = md5($senha);
	$nome = mysqli_real_escape_string($conexao, $nome);
	$query = "insert into usuarios (nome, tipo_mackenzista, identificador, senha)  
	values ('$nome', '$tipo_mackenzista', '$identificador','$senhaMd5')";
	$usuarioCadastrado = mysqli_query($conexao, $query);
	return $usuarioCadastrado;
}