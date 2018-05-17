<?php
require_once("banco-usuario.php");
require_once("banco-produto.php");
require_once("class/Lanchonete.php");
require_once("conecta.php");



$arquivo = 'Usuarios_'.$_GET["mackenzista"].'_mackcupons.xls';

$html = '';
$html= '<table border="1">';
	$html .= '<tr>';
		$html .= '<th colspan="9" style="background-color:gray;color:white">Mackenzistas '.$_GET["mackenzista"].'</th>';
	$html .= '</tr>';
	$html .= '<tr>';
		$html .= '<th colspan="1" scope="col">ID</th>';
		$html .= '<th colspan="3" scope="col">Nome</th>';
		$html .= '<th colspan="2" scope="col">Tipo Mackenzista</th>';
		$html .= '<th colspan="1" scope="col">ADM</th></td>';
		$html .= '<th colspan="2" scope="col">Identificador</th>';
	$html .= '</tr>';

	$usuarios = listaUsuarios($conexao);
	foreach($usuarios as $usuario) {
		if($usuario["tipo_mackenzista"] == $_GET["mackenzista"]){

	$html .= '<tbody>';
		$html .= '<tr>';
			$html .= '<td colspan="1">'.$usuario["id"].'</td>';
			$html .= '<td colspan="3">'.$usuario["nome"].'</td>';
			$html .= '<td colspan="2">'.$usuario["tipo_mackenzista"].'</td>';
			$html .= '<td colspan="1">'.$usuario["adm"].'</td>';
			$html .= '<td colspan="2">'.$usuario["identificador"].'</td>';
		$html .= '</tr>';
	$html .= '</tbody>';
	}
}

	$html .= '</tr>';
$html .= '</table>';


header ("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );

echo $html;
exit;