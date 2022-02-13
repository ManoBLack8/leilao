<?php
include_once('admin/includes/conexao.php');
session_start();
extract($_REQUEST);

if ($email != $email2) {
    echo "os email não são iguais";
}
if ($senha != $cosenha) {
    echo "as senhas não conferem";
}
$ip = $_SERVER['REMOTE_ADDR'];
$data_agora = date("Y-m-d H:i:s");
$query = "INSERT INTO usuarios VALUES (NULL, '$login', '$senha', '$nome', '$email', '$cpf', '$telefone', '$sexo', 'S', '$data_nascimento', '$endereco', '$numero', '$complemento', '$cep', '$bairro', '$cidade', '$estado', '$data_agora', '$data_agora', '0', '5', '$ip', '1' )";
$inseiri = $pdo->query($query);

$sql = " SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'";

$query = $pdo->query($sql);
$resultset = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($resultset) > 0 || !empty($resultset)) {
    if (!$resultset[0]['status']) {
        $msg = "Usuário Inativo.";

        $_SESSION['msg_error'] = $msg;

    } else {
        $id_admin = $resultset[0]['id'];
        $login_admin = $resultset[0]['login'];
        $num_lances_admin = $resultset[0]['num_lances'];

        $_SESSION["id_usuario"] = $id_admin;
        $_SESSION["login_usuario"] = $login_admin;
        $_SESSION["num_lances_usuario"] = $num_lances_admin;

        header('location: index.php');
    }
} else {
    header('location: index.php');
}

