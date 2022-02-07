<?php
include_once('admin/includes/conexao.php');
$datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));

$query_leiloes = "SELECT id, duracao, comeca_em FROM leiloes WHERE status = 1  ORDER BY comeca_em ASC ";

$result_leiloes = $pdo->query($query_leiloes);
$result_leiloes = $result_leiloes->fetchAll(PDO::FETCH_ASSOC);
$num_leiloes = count($result_leiloes);

if ($num_leiloes > 0) {
    foreach ($result_leiloes as $leilao) {
        if ($leilao['comeca_em'] <= $datetime_atual) {
            if ($leilao['duracao'] == 0) {
                $query_up = "UPDATE leiloes SET arrematado_em = '" . $datetime_atual . "', finalizado = 1 WHERE id = " . $leilao['id'];
                $result_up = $pdo->query($query_up);
                $result_up = $result_up->fetchAll(PDO::FETCH_ASSOC);


                $query_lances = "SELECT id FROM lances WHERE id_leilao = " . $leilao['id'] . " ORDER BY id DESC LIMIT 0, 1";
                $result_lances = $pdo->query($query_lances);
                $result_lances = $result_lances->fetchAll(PDO::FETCH_ASSOC);
                $num_lances = count($result_lances);

                if ($num_lances > 0) {
                    $lance = $result_lances;

                    $query = "INSERT INTO vencedores VALUES (NULL, " . $lance['id'] . ")";
                    $result = $pdo->query($query);
                    $result = $result->fetchAll(PDO::FETCH_ASSOC);
                    var_dump($result);
                }
            } else {
                $leilao['duracao'] = $leilao['duracao'] - 1;

                $query_up = "UPDATE leiloes SET duracao = " . $leilao['duracao'] . " WHERE id = " . $leilao['id'];
                $result_up = $pdo->query($query_up);
                
            }
        }
    }
}
?>