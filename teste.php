<?php
include_once('admin/includes/conexao.php');
$datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$datetime_atual_micro = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), (gmdate("s") + 16), gmdate("m"), gmdate("d"), gmdate("Y")));
$sql = "SELECT * FROM leiloes WHERE id = '5'";
    $result_leiloes = $pdo->query($sql);
    $result_leiloes = $result_leiloes->fetchAll(PDO::FETCH_ASSOC);

    $iniciomk = strtotime($result_leiloes[0]["inicio_em"]);
    $atualmk = strtotime($datetime_atual);
    var_dump($iniciomk);
    echo "<br>";
    var_dump($atualmk);
    echo "<br>";
    var_dump($result_leiloes[0]["inicio_em"]);
    if ($iniciomk > $atualmk) {
           echo "iae";
    }