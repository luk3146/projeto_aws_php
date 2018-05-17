<?php
session_start();
require_once("../conecta.php");
require_once("../banco-lanchonete.php");
require_once("../class/Lanchonete.php");
require_once("../banco-usuario.php");


if($_POST["create"] == "sim"){

	$foto_loja = $_FILES["arquivo"]["name"];
	$_UP["pasta"] = "../imagens/";

	$extensao = strrchr($_FILES['arquivo']['name'], '.');

	if($extensao != ("jpg" or "png" or "gif")){
		$_SESSION["danger"] = "Extensão inválida!";
		header("Loation: gesta.php");
	}

	$tot = count(listaLanchonetes($conexao));
	$tot += 1;
	$nome_final = $tot.".png";

	if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP["pasta"]. $nome_final)){

		$lanchonete = new Lanchonete(
			$tot,
			addslashes($_POST["nome"]),
		 	addslashes($_POST["descricao"]),
		 	addslashes($_POST["cupom"])
		);

		if(insereLanchonete($conexao, $lanchonete)){
			$_SESSION["success"] = "Nova loja inserida com sucesso!";
			header("Location: ../gestao.php?cupom=sim");
		} 

			
	}else {
			$_SESSION["danger"] = "Nova loja não foi inserida!";
			header("Location: ../gestao.php");
		}

}


if($_POST["update"] == "sim"){
	$lanchonete = new Lanchonete(
		$_POST["id_lanchonete"],
		addslashes($_POST["nome"]),
	 	addslashes($_POST["descricao"]),
	 	addslashes($_POST["cupom"])
	);

	if(alteraLanchonete($conexao, $lanchonete)){
		$_SESSION["success"] = "Loja atualizada com sucesso!";
		header("Location: ../gestao.php?cupom=sim");
	} else {
		$_SESSION["danger"] = "Loja não foi atualizada!";
		header("Location: ../gestao.php");
	}
}



if($_POST["inserir_cupons"] == "sim"){

	$cupons = $_POST["descricao_cupom1"].",".$_POST["descricao_cupom2"].",".$_POST["descricao_cupom3"];

	$lanchonete = new Lanchonete(
		$_POST["id_lanchonete"],
		addslashes($_POST["nome"]),
	 	addslashes($_POST["descricao"]),
	 	addslashes($cupons)
	);

	if(insereCupon($conexao, $lanchonete)){
		$_SESSION["success"] = "Cupons inseridos com sucesso!";
		header("Location: ../gestao.php?cupom=sim");
	} else {
		$_SESSION["danger"] = "Cupons não foram inseridos!";
		header("Location: ../gestao.php");
	}
}





if($_POST["delete"] == "sim"){

	if(removeLanchonete($conexao, $_POST["id_lanchonete"])){
		$_SESSION["success"] = "Loja deletada com sucesso!";
		header("Location: ../gestao.php?cupom=sim");
	} else {
		$_SESSION["danger"] = "Loja não foi deletada!";
		header("Location: ../gestao.php?cupom=sim");
	}
}


if($_POST["acessos"] != ""){
	$verifica = acessos($conexao, $_POST["identificador"],$_POST["tipo_mackenzista"]);
	header("Location: ../gestao.php?tipo_mackenzista=$_POST[tipo]");
}
	