<?php
require_once("banco-usuario.php");
require_once("banco-produto.php");
require_once("class/Lanchonete.php");
require_once("conecta.php");



$arquivo = 'LOGS_mackcupons.xls';

$html = '';
$html= '<table border="1">';
	$html .= '<tr>';
		$html .= '<th colspan="13" style="background-color:gray;color:white">HISTORICO DE ACESSO</th>';
	$html .= '</tr>';
	$html .= '<tr>';
		$html .= '<th colspan="1" scope="col">ID</th>';
		$html .= '<th colspan="3" scope="col">NOME</th>';
		$html .= '<th colspan="2" scope="col">IDENTIFICADOR</th>';
		$html .= '<th colspan="2" scope="col">ACAO</th>';
		$html .= '<th colspan="1" scope="col">NOME USUARIO</th>';
		$html .= '<th colspan="2" scope="col">IDENTIFICADOR USUARIO</th>';
		$html .= '<th colspan="2" scope="col">DATA</th>';
	$html .= '</tr>';

	$usuarios = historico($conexao);
	foreach($usuarios as $usuario) {


	$html .= '<tbody>';
		$html .= '<tr>';
			$html .= '<td colspan="1">'.$usuario["id"].'</td>';
			$html .= '<td colspan="3">'.$usuario["nome_admin"].'</td>';
			$html .= '<td colspan="2">'.$usuario["identificador_admin"].'</td>';
			$html .= '<td colspan="2">'.$usuario["realizou"].'</td>';
			$html .= '<td colspan="1">'.$usuario["nome_usuario_admin"].'</td>';
			$html .= '<td colspan="2">'.$usuario["identificador_usuario_admin"].'</td>';
			$html .= '<td colspan="2">'.$usuario["data_horario"].'</td>';
		$html .= '</tr>';
	$html .= '</tbody>';

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