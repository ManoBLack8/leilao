<?php
$hr = date("H:i", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$dia = date("d", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$mes = date("n", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$ano = date("Y", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));

$meses = array('JANEIRO', 'FEVEREIRO', 'MARÇO', 'ABRIL', 'MAIO', 'JUNHO', 'JULHO', 'AGOSTO', 'SETEMBRO', 'OUTUBRO', 'NOVEMBRO', 'DEZEMBRO');

echo json_encode(array('time' => $hr, 'dia' => $dia, 'mes' => $meses[$mes-1], 'ano' => $ano));
?>