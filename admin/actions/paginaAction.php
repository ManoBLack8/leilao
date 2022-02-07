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
        $result = mysql_query($query);

        $query = "SELECT * FROM paginas WHERE id = " . $id;
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_error'] = 'Erro ao excluir a página!';

            header('location: ../pagina');
        } else {
            $_SESSION['msg_success'] = 'Página excluída com sucesso!';

            header('location: ../pagina');
        }

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        $query = "SELECT * FROM paginas WHERE id = " . $id;
        $result = mysql_query($query);
        $admin = mysql_fetch_assoc($result);

        $titulo = $admin['titulo'];
        $slug = $admin['slug'];
        $conteudo = $admin['conteudo'];
        $status = $admin['status'];

        $_SESSION['id_edit'] = $id;
        $_SESSION['titulo_edit'] = $titulo;
        $_SESSION['slug_edit'] = $slug;
        $_SESSION['conteudo_edit'] = $conteudo;
        $_SESSION['status_edit'] = $status;

        header("location: ../pagina_editar.php");

        break;

    case 'edt':
        $id = $_POST['id'];
        $titulo = utf8_decode($_POST['titulo']);
        $slug = create_slug($_POST['titulo']);
        $conteudo = utf8_decode($_POST['conteudo']);
        $status = $_POST['status'];

        $query = "UPDATE paginas SET titulo = '" . $titulo . "', slug = '" . $slug . "', conteudo = '" . $conteudo . "', status = " . $status . " WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT id FROM paginas WHERE titulo = '" . $titulo . "' AND slug = '" . $slug . "' AND conteudo = '" . $conteudo . "' AND status = " . $status;
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Página editada com sucesso!';

            header('location: ../pagina');
        } else {
            $_SESSION['msg_error'] = 'Erro ao editar a página!';

            header('location: ../pagina');
        }

        break;

    case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE paginas SET status = 1 WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT id FROM paginas WHERE id = " . $id . " AND status = 1";
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Página ativada com sucesso!';

            header('location: ../pagina');
        } else {
            $_SESSION['msg_error'] = 'Erro ao ativar a página!';

            header('location: ../pagina');
        }

        break;

    case 'itv':
        $id = $_REQUEST['id'];

        $query = "UPDATE paginas SET status = 0 WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT id FROM paginas WHERE id = " . $id . " AND status = 0";
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Página inativada com sucesso!';

            header('location: ../pagina');
        } else {
            $_SESSION['msg_error'] = 'Erro ao inativar a página!';

            header('location: ../pagina');
        }

        break;
}
?>