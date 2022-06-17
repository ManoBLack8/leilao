<?php
include_once('admin/includes/conexao.php');
$id = $_REQUEST['id'];
$datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));

$sql = "UPDATE leiloes SET arrematado_em = '$datetime_atual', finalizado = 1, status = '4' WHERE id = '$id'";
$pdo->query($sql);