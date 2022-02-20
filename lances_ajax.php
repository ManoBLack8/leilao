<?php
include_once('admin/includes/conexao.php');
session_start();
function getLances() {
    include_once('admin/includes/conexao.php');
    global $pdo;
    $datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
    $lances = array();
    $resultado = array();

    //AND comeca_em >= '$datetime_atual'
    $query_leiloes = "SELECT * FROM leiloes WHERE status = 1 ORDER BY comeca_em ASC ";

    $result_leiloes = $pdo->query($query_leiloes);
    $result_leiloes = $result_leiloes->fetchAll(PDO::FETCH_ASSOC);
    $num_leiloes = count($result_leiloes);

    if ($num_leiloes > 0) {
        $resultado['result'] = TRUE;

        foreach ($result_leiloes as $leilao) {
            $leilao['comecou'] = FALSE;
            $leilao['finalizou'] = FALSE;

            if ($leilao['comeca_em'] <= $datetime_atual) {
                $leilao['comecou'] = TRUE;

                if ($leilao['duracao'] == 0) $leilao['finalizou'] = TRUE;
                
            }
            $leilao['duracao'] = ($leilao['duracao'] < 10) ? "0" . $leilao['duracao'] : $leilao['duracao'];
            $lance_valor = 0;
            $lance_usuario = "---";
            $leilao_id = $leilao['id'];

            $duracao_escolher = rand(3, 6);
            if ($leilao['finalizado'] < 1) {
                if ($leilao['duracao'] < $duracao_escolher) {
                    $id = $leilao['id'];

                    $q_leiloes = $pdo->query("SELECT SUM(valor_lance) FROM lances WHERE id_leilao = '$id' AND id_usuario != 37");
                    $q_leiloes = $q_leiloes->fetchAll(PDO::FETCH_ASSOC);
                    $q_leiloes[0]['SUM(valor_lance)'];
                    if ($q_leiloes[0]['SUM(valor_lance)'] < 1500) {
                        $query = "INSERT INTO lances VALUES (NULL, " . $id . ", '37', '0.01', '" . $datetime_atual . "')";
                        $result = $pdo->query($query);
                        $query_up = "UPDATE leiloes SET duracao = '15' WHERE id = " . $id;
                        $result_up = $pdo->query($query_up);
                    }
                    
                }
            }

            $query_lances = "SELECT valor_lance, login FROM lances l LEFT JOIN usuarios u ON l.id_usuario = u.id WHERE l.id_leilao = '$leilao_id' ";
            //echo $query_lances;
            $result_lances = $pdo->query($query_lances);
            $result_lances = $result_lances->fetchAll(PDO::FETCH_ASSOC);

            $num_lances = count($result_lances);

            $query_usu = "SELECT SUM(valor_lance) FROM lances WHERE id_leilao = '$leilao_id' LIMIT 1";
            //echo $query_lances;
            $result_usu = $pdo->query($query_usu);
            $result_usu = $result_usu->fetchAll(PDO::FETCH_ASSOC);
            
            if ($num_lances > 0) {
                foreach ($result_lances as $lance) {
                
                //print_r($lance);
                $lance_valor = $result_usu[0]['SUM(valor_lance)'];
                $lance_usuario = $lance['login'];
                }
            }

            $leilao['usuario'] = $lance_usuario;
            $leilao['valor_lance'] = number_format($lance_valor, 2, ',', '.');

            $lances[] = $leilao;
        }
    } else {
        $resultado['result'] = FALSE;
    }

    $resultado['lances'] = $lances;
    return $resultado;
}

function setLance($id_leilao, $id_usuario, $valor_lance, $duracao, $comeca_em) {
    global $pdo;
    $query = "SELECT num_lances FROM usuarios WHERE id = ". $id_usuario ."";
    $num_lances = $pdo->query($query);
    $num_lances = $num_lances->fetchAll(PDO::FETCH_ASSOC);
    foreach ($num_lances as $nlances) {
        $perdeu_lance = $nlances['num_lances'] - 1;
        $query = "UPDATE usuarios SET num_lances = $perdeu_lance WHERE id = $id_usuario";
        $result = $pdo->query($query);
        $_SESSION['num_lances_usuario'] = $perdeu_lance;

    }

    $datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
    $resultado['result'] = FALSE;

    $query = "INSERT INTO lances VALUES (NULL, " . $id_leilao . ", " . $id_usuario . ", '" . $valor_lance . "', '" . $datetime_atual . "')";
    $result = $pdo->query($query);

    $query = "SELECT id FROM lances WHERE id_leilao = " . $id_leilao . " AND id_usuario = " . $id_usuario . " AND lance_em = '" . $datetime_atual . "'";
    $result = $pdo->query($query);
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    $num_result = count($result);

    if ($num_result > 0) {
        if($comeca_em <= $datetime_atual){
            $nova_duracao = 15;
            $query = "UPDATE leiloes SET duracao = " . $nova_duracao . " WHERE id = " . $id_leilao;
            $result = $pdo->query($query);
        }

        $resultado['result'] = TRUE;
    }
    return $resultado;

}

$action = @$_REQUEST['action'];
$id_leilao = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : NULL;

if ($action == "get") {
    $retorno = getLances();

    echo json_encode($retorno);
} else if ($action == "set") {
    $usuario = 0;
    $valor_lance = 0.01;
    $id_usuario = $_REQUEST['id_usuario'];
    
    $query_num_lances = "SELECT num_lances FROM usuarios WHERE id = " . $id_usuario;
    $result_num_lances = $pdo->query($query_num_lances);
    $result_num_lances = $result_num_lances->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result_num_lances as $num_lances) {
        $num_num_lances = $num_lances["num_lances"];
    }

    if ($num_num_lances > 0) {
        $query_lances = "SELECT id_usuario, valor_lance FROM lances WHERE id_leilao = " . $id_leilao . " ORDER BY id DESC LIMIT 0, 1";
        $result_lances = $pdo->query($query_lances);
        $result_lances = $result_lances->fetchAll(PDO::FETCH_ASSOC);
        $num_lances = count($result_lances);

        if ($num_lances > 0) {
            $lance = $result_lances;

            $usuario = $lance['id_usuario'];
            $valor_lance = $lance['valor_lance'] + 0.01;
        }

        if($usuario != $id_usuario){    
            $query_duracao = "SELECT duracao, comeca_em FROM leiloes WHERE id = " . $id_leilao;
            $result_duracao = $pdo->query($query_duracao);
            $result_duracao = $result_duracao->fetchAll(PDO::FETCH_ASSOC);
            $num_duracao = count($result_duracao);

            if ($num_duracao > 0) {
                $leilao = $result_duracao;

                $duracao = $leilao['duracao'];
                $comeca_em = $leilao['comeca_em'];
            }

            $retorno = setLance($id_leilao, $id_usuario, $valor_lance, $duracao, $comeca_em);
        } else{
            $resultado['result'] = FALSE;
            $resultado['reason'] = "O último lance já é seu.";
            
            $retorno = $resultado;
        }
    } else{
        $resultado['result'] = FALSE;
        $resultado['reason'] = "Você não tem mais lances, compre mais para continuar na disputa.";
        
        $retorno = $resultado;
    }

    echo json_encode($retorno);
}
?>