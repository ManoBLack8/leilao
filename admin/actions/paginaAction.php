<?php

session_start();
include('../includes/conexao.php');
include('../includes/funcoes.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        $titulo = utf8_decode($_POST['titulo']);
        $slug = ($_POST['slug'] == "") ? create_slug($_POST['titulo']) : $_POST['slug'];
        $conteudo = utf8_decode($_POST['conteudo']);
        $status = $_POST['status'];

        $query = "INSERT INTO paginas VALUES (NULL, '" . $titulo . "', '" . $slug . "', '" . $conteudo . "', " . $status . ")";
        $result = $pdo->query($query);

        header('location: ../pagina.php');

        break;

    case 'del':
        $id = $_REQUEST['id'];

        $query = "DELETE FROM paginas WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT * FROM paginas WHERE id = " . $id;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_error'] = 'Erro ao excluir a página!';

            header('location: ../pagina.php');
        } else {
            $_SESSION['msg_success'] = 'Página excluída com sucesso!';

            header('location: ../pagina.php');
        }

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        header("location: ../pagina_editar.php?id='$id'");

        break;

    case 'edt':
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $slug = create_slug($_POST['titulo']);
        $conteudo = $_POST['conteudo'];
        $status = $_POST['status'];

        $query = "UPDATE paginas SET titulo = '$titulo', slug = '$slug', conteudo = '$conteudo', status = '$status' WHERE id = $id";
        $result = $pdo->query($query);
        echo "oi";

        $query = "SELECT id FROM paginas WHERE titulo = '" . $titulo . "' AND slug = '" . $slug . "' AND conteudo = '" . $conteudo . "' AND status = " . $status;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

       
        

        break;

    case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE paginas SET status = 1 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM paginas WHERE id = " . $id . " AND status = 1";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Página ativada com sucesso!';

            header('location: ../pagina.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao ativar a página!';

            header('location: ../pagina.php');
        }

        break;

    case 'itv':
        $id = $_REQUEST['id'];

        $query = "UPDATE paginas SET status = 0 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM paginas WHERE id = " . $id . " AND status = 0";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Página inativada com sucesso!';

            header('location: ../pagina.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao inativar a página!';

            header('location: ../pagina.php');
        }

        break;
}
?>