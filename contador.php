<?php
include_once('admin/includes/conexao.php');
$datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));

$query_leiloes = "SELECT id, duracao, comeca_em FROM leiloes WHERE status = 1  ORDER BY comeca_em ASC ";
$result_leiloes = $pdo->query($query_leiloes);
$result_leiloes = $result_leiloes->fetchAll(PDO::FETCH_ASSOC);
$num_leiloes = count($result_leiloes); 

for ($i=0; $i < $num_leiloes; $i++) {
    $id = $result_leiloes[$i]['id'];
    $comeca_em = $result_leiloes[$i]['comeca_em'];
    $duracao = $result_leiloes[$i]['duracao'];
    
    if ($comeca_em <= $datetime_atual) {
        if ($duracao == 0) {
            $query_up = "UPDATE leiloes SET arrematado_em = '" . $datetime_atual . "', finalizado = 1 WHERE id = " . $id;
            $result_up = $pdo->query($query_up);
    
            $query_lances = "SELECT id FROM lances WHERE id_leilao = " . $id . " ORDER BY id DESC LIMIT 0, 1";
            $result_lances = $pdo->query($query_lances);
            $result_lances = $result_lances->fetchAll(PDO::FETCH_ASSOC);
            $num_lances = count($result_lances);
            
            if ($num_lances > 0) {
                foreach ($result_lances as $lance) {
                    $query_vencedores = "SELECT * FROM vencedores WHERE id_lance = " . $lance['id'] . "";
                    $result_vencedores = $pdo->query($query_vencedores);
                    $result_vencedores = $result_vencedores->fetchAll(PDO::FETCH_ASSOC);
                    if (count($result_vencedores) < 1) {
                        $query = "INSERT INTO vencedores VALUES (NULL, " . $lance['id'] . ")";
                        $result = $pdo->query($query);
                    }

                    
                }
            }
            
        } else {
            $duracao = $duracao - 1;
            $query_up = "UPDATE leiloes SET duracao = " . $duracao . " WHERE id = " . $id;
            $result_up = $pdo->query($query_up);
            
            
            
        }
    }    
    
}


?>