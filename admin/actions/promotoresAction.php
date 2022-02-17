<?php

session_start();
include('../includes/conexao.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        $titulo = $_POST['titulo'];

        $query = "INSERT INTO promotores (id, nome, link, status) VALUES (NULL, '$titulo', '-', '1')";
        $result = $pdo->query($query);

        $query = "SELECT id FROM promotores WHERE nome = '$titulo'";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Pacote de Lance cadastrado com sucesso!';

            header('location: ../promotores.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao cadastrar o pacote de lance!';

            header('location: ../promotores.php');
        }

        break;

    case 'del':
        $id = $_REQUEST['id'];

        $query = "UPDATE promotores SET status = '-1' WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT * FROM promotores WHERE id = " . $id;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_error'] = 'Erro ao excluir o pacote de lance!';

            header('location: ../promotores.php');
        } else {
            $_SESSION['msg_success'] = 'Pacote de lance excluído com sucesso!';

            header('location: ../promotores.php');
        }

        break;

    case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE promotores SET status = 1 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM promotores WHERE id = " . $id . " AND status = 1";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Administrador ativado com sucesso!';

            header('location: ../promotores.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao ativar o administrador!';

            header('location: ../promotores.php');
        }

        break;

    case 'itv':
        $id = $_REQUEST['id'];

        $query = "UPDATE promotores SET status = 0 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM promotores WHERE id = " . $id . " AND status = 0";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Administrador inativado com sucesso!';

            header('location: ../promotores.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao inativar o administrador!';

            header('location: ../promotores.php');
        }

        break;
}
?>