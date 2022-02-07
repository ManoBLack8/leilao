<?php
session_start();

$pagina_anterior = $_SESSION['pagina_anterior'];

session_destroy();
session_start();

include_once ('admin/includes/conexao.php');

$acao = $_POST["acao"];

if (!empty($acao)) {
    switch ($acao) {
        case 'efetuar_login':
            $usuario = $_POST["login"];
            $senha = $_POST["password"];

            $sql = " SELECT * FROM usuarios WHERE login = '$usuario' and senha = '$senha'";

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
                $msg = "Usuário ou Senha incorreto.";

                $_SESSION['msg_error'] = $msg;

                header('location: '. $pagina_anterior);
            }
            break;
        case 'recuperar_senha':
            
            break;
        default:
            break;
    }
}
?>
