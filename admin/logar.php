<?php
session_start();
session_destroy();
session_start();

include_once ('includes/conexao.php');

$acao = $_POST["acao"];

if (!empty($acao)) {
    switch ($acao) {
        case 'efetuar_login':
            $usuario = $_POST["login"];
            $senha = $_POST["password"];

            $sql = " SELECT * FROM admin ";
            $sql .= " WHERE login = '$usuario' and senha = '$senha'";

            $query = $pdo->query($sql);
            $query = $query->fetchAll(PDO::FETCH_ASSOC);
            $resultset = $query[0];
            if ($query > 0 || !empty($resultset)) {
                if (!$resultset['status']) {
                    $msg = "Usuário Inativo.";

                    $_SESSION['msg_error'] = $msg;

                    header('location: login.php');
                } else {
                    $id_admin = $resultset['id'];
                    $login_admin = $resultset['login'];

                    $_SESSION["id_admin"] = $id_admin;
                    $_SESSION["login_admin"] = $login_admin;

                    header('location: index.php');
                }
            } else {
                $msg = "Usuário ou Senha incorreto.";

                $_SESSION['msg_error'] = $msg;

                header('location: login.php');
            }
            break;
        case 'recuperar_senha':
            
            break;
        default:
            break;
    }
}
?>
