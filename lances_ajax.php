<?php
include_once('admin/includes/conexao.php');
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
                
                /*if ($leilao['duracao'] == 0) {
                    $query_up = "UPDATE leiloes SET arrematado_em = '" . $datetime_atual . "', finalizado = 1 WHERE id = " . $leilao['id'];
                    $result_up = mysql_query($query_up);

                    $leilao['finalizou'] = TRUE;
                } else {
                    $leilao['duracao'] = $leilao['duracao'] - 1;

                    $query_up = "UPDATE leiloes SET duracao = " . $leilao['duracao'] . " WHERE id = " . $leilao['id'];
                    $result_up = mysql_query($query_up);
                }*/
            }

            $leilao['duracao'] = ($leilao['duracao'] < 10) ? "0" . $leilao['duracao'] : $leilao['duracao'];
            $lance_valor = 0;
            $lance_usuario = "---";
            $leilao_id = $leilao['id'];

            $query_lances = "SELECT l.valor_lance, SUM(l.valor_lance), u.login FROM lances l, usuarios u WHERE l.id_leilao = $leilao_id ";
            //echo $query_lances;
            $result_lances = $pdo->query($query_lances);
            $result_lances = $result_lances->fetchAll(PDO::FETCH_ASSOC);
            $num_lances = count($result_lances);

            if ($num_lances > 0) {
                foreach ($result_lances as $lance) {
                //print_r($lance);
                $lance_valor = $lance['SUM(l.valor_lance)'];
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
    $datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
    $resultado['result'] = FALSE;

    $query = "INSERT INTO lances VALUES (NULL, " . $id_leilao . ", " . $id_usuario . ", '" . $valor_lance . "', '" . $datetime_atual . "')";
    $result = $pdo->query($query);

    $query = "SELECT id FROM lances WHERE id_leilao = " . $id_leilao . " AND id_usuario = " . $id_usuario . " AND lance_em = '" . $datetime_atual . "'";
    $result = $pdo->query($query);
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    $num_result = ($result);

    if ($num_result > 0) {
        if($comeca_em <= $datetime_atual){
            if ($duracao > 15)
                $nova_duracao = $duracao + 2;
            elseif ($duracao > 10 && $duracao <= 15)
                $nova_duracao = $duracao + 6;
            else
                $nova_duracao = $duracao + 11;

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
    $num_num_lances = count($result_num_lances);

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