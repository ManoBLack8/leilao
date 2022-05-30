<?php
include_once('admin/includes/conexao.php');
    global $pdo;
    $datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
    $lances = array();
    $resultado = array();
    $id_leilao = $_REQUEST['action'];
    //AND comeca_em >= '$datetime_atual'
    $query_leiloes = "SELECT * FROM leiloes ORDER BY comeca_em ASC ";

    $result_leiloes = $pdo->query($query_leiloes);
    $result_leiloes = $result_leiloes->fetchAll(PDO::FETCH_ASSOC);
 
    return $result_leiloes[0];