<?php

require_once("banco-lanchonete.php");
require_once("banco-produto.php");
require_once("class/Lanchonete.php");
require_once("conecta.php");



$arquivo = 'LANCHONETES CADASTRADAS_mackcupons.xls';

$html = '';
$html= '<table border="1">';
	$html .= '<tr>';
		$html .= '<th colspan="7" style="background-color:gray;color:white">LANCHONETES</th>';
	$html .= '</tr>';
	$html .= '<tr>';
		$html .= '<th colspan="1" scope="col">ID</th>';
		$html .= '<th colspan="3" scope="col">NOME FANTASIA</th>';
		$html .= '<th colspan="2" scope="col">DESCRICAO</th>';
		$html .= '<th colspan="1" scope="col">CUPOM</th></td>';
	$html .= '</tr>';

	$restaurantes = listaLanchonetes($conexao);
	foreach($restaurantes as $lanchonete) {

	$html .= '<tbody>';
		$html .= '<tr>';
			$html .= '<td colspan="1">'.$lanchonete->getId_lanchonete().'</td>';
			$html .= '<td colspan="3">'.utf8_encode($lanchonete->getNome()).'</td>';
			$html .= '<td colspan="2">'.utf8_encode($lanchonete->getDescricao()).'</td>';
			$html .= '<td colspan="1">'.utf8_encode($lanchonete->getCupom()).'</td>';
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