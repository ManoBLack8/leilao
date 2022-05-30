<?php
include_once('admin/includes/conexao.php');
session_start();
$id_leilao = $_REQUEST['CodigoLeilao'];
$usuario = 0;
$valor_lance = 0.01;
$id_usuario = @$_SESSION['id_usuario'];
var_dump($_SESSION);
$query_num_lances = "SELECT num_lances FROM usuarios WHERE id = " . $id_usuario;
$result_num_lances = $pdo->query($query_num_lances);
$result_num_lances = $result_num_lances->fetchAll(PDO::FETCH_ASSOC);
foreach ($result_num_lances as $num_lances) {
    $num_num_lances = $num_lances["num_lances"];
}

if ($num_num_lances > 0) {
    $query_lances = "SELECT id_usuario, valor_lance FROM lances WHERE id_leilao = '$id_leilao' ORDER BY id DESC ";
    $result_lances = $pdo->query($query_lances);
    $result_lances = $result_lances->fetchAll(PDO::FETCH_ASSOC);
    $num_lances = count($result_lances);
     
    if ($num_lances > 0) {
        foreach ($result_lances as $lance) {
            $usuario = @$lance['id_usuario'];
            $valor_lance = @$lance['valor_lance'] + 0.01;   
        }
    }

    if($usuario != $id_usuario){    
        $query_duracao = "SELECT duracao, comeca_em FROM leiloes WHERE id = " . $id_leilao;
        $result_duracao = $pdo->query($query_duracao);
        $result_duracao = $result_duracao->fetchAll(PDO::FETCH_ASSOC);
        $num_duracao = count($result_duracao);

        if ($num_duracao > 0) {
            $leilao = $result_duracao;

            $duracao = @$leilao['duracao'];
            $comeca_em = @$leilao['comeca_em'];
        }

        setLance($id_leilao, $id_usuario, $valor_lance, $duracao, $comeca_em);
    } else{
            echo "LANCESENDOCOMPUTADO";
        
        $retorno = $resultado;
    }
} else{
    
    $resultado = "SEMLANCES";
    
    $retorno = $resultado;
}

echo "SUCESSO";
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

        $resultado = "SUCESSO";
    }
    return $resultado;

}