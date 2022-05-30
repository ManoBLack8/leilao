<?php
include_once('admin/includes/conexao.php');
session_start();
date_default_timezone_set('America/Sao_Paulo');
$id_leilao = $_REQUEST['CodigoLeilao'];
$usuario = 0;
$valor_lance = 0.01;
$id_usuario = @$_SESSION['id_usuario'];
if ($id_usuario > 0) {

    $query_num_lances = "SELECT num_lances FROM usuarios WHERE id = '$id_usuario'";
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
            $lance = $result_lances[0];

            $usuario = $lance['id_usuario'];
            $valor_lance = $lance['valor_lance'] + 0.01;
        }

        if($usuario != $id_usuario){    
            $query_duracao = "SELECT duracao, comeca_em FROM leiloes WHERE id = " . $id_leilao;
            $result_duracao = $pdo->query($query_duracao);
            $result_duracao = $result_duracao->fetchAll(PDO::FETCH_ASSOC);
            $num_duracao = count($result_duracao);
            foreach ($result_duracao as $dura) {
                $duracao = $dura['duracao'];
                $comeca_em = $dura['comeca_em'];
            }

            setLance($id_leilao, $id_usuario, $valor_lance, $duracao, $comeca_em);
        }else{
                echo "LANCESENDOCOMPUTADO";
        }
    } else{
        
        echo "SEMLANCES";

    }

}else{
    echo "NAOLOGADO";
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
    $datetime_atual_micro = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), (gmdate("s") + 15), gmdate("m"), gmdate("d"), gmdate("Y")));

    $query = "INSERT INTO lances VALUES (NULL, " . $id_leilao . ", " . $id_usuario . ", '" . $valor_lance . "', '" . $datetime_atual . "')";
    $result = $pdo->query($query);

    $query = "SELECT id FROM lances WHERE id_leilao = " . $id_leilao . " AND id_usuario = " . $id_usuario . " AND lance_em = '" . $datetime_atual . "'";
    $result = $pdo->query($query);
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    $num_result = count($result);

    if ($num_result > 0) {
        if($comeca_em <= $datetime_atual){
            $nova_duracao =  $datetime_atual_micro;
            $query = "UPDATE leiloes SET comeca_em = '$datetime_atual_micro' WHERE id = " . $id_leilao;
            $result = $pdo->query($query);
        }

        $resultado = "SUCESSO";
    }
    echo $resultado;

}