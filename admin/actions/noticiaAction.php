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
        $data_postagem = date('Y-m-d H:i');
        $status = $_POST['status'];

        $query = "INSERT INTO noticias VALUES (NULL, '" . $titulo . "', '" . $slug . "', '" . $conteudo . "', '". $data_postagem ."', " . $status . ")";
        $result = mysql_query($query);

        $query = "SELECT id FROM noticias WHERE titulo = '" . $titulo . "' AND slug = '" . $slug . "' AND data_postagem = '" . $data_postagem . "'";
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Notícia cadastrada com sucesso!';

            header('location: ../noticia');
        } else {
            $_SESSION['msg_error'] = 'Erro ao cadastrar a notícia!';

            header('location: ../noticia');
        }

        break;

    case 'del':
        $id = $_REQUEST['id'];

        $query = "DELETE FROM noticias WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT * FROM noticias WHERE id = " . $id;
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_error'] = 'Erro ao excluir a notícia!';

            header('location: ../noticia');
        } else {
            $_SESSION['msg_success'] = 'Notícia excluída com sucesso!';

            header('location: ../noticia');
        }

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        $query = "SELECT * FROM noticias WHERE id = " . $id;
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

        header("location: ../noticia_editar.php");

        break;

    case 'edt':
        $id = $_POST['id'];
        $titulo = utf8_decode($_POST['titulo']);
        $slug = create_slug($_POST['titulo']);
        $conteudo = utf8_decode($_POST['conteudo']);
        $status = $_POST['status'];

        $query = "UPDATE noticias SET titulo = '" . $titulo . "', slug = '" . $slug . "', conteudo = '" . $conteudo . "', status = " . $status . " WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT id FROM noticias WHERE titulo = '" . $titulo . "' AND slug = '" . $slug . "' AND conteudo = '" . $conteudo . "' AND status = " . $status;
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Notícia editada com sucesso!';

            header('location: ../noticia');
        } else {
            $_SESSION['msg_error'] = 'Erro ao editar a notícia!';

            header('location: ../noticia');
        }

        break;

    case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE noticias SET status = 1 WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT id FROM noticias WHERE id = " . $id . " AND status = 1";
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Notícia ativada com sucesso!';

            header('location: ../noticia');
        } else {
            $_SESSION['msg_error'] = 'Erro ao ativar a notícia!';

            header('location: ../noticia');
        }

        break;

    case 'itv':
        $id = $_REQUEST['id'];

        $query = "UPDATE noticias SET status = 0 WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT id FROM noticias WHERE id = " . $id . " AND status = 0";
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Notícia inativada com sucesso!';

            header('location: ../noticia');
        } else {
            $_SESSION['msg_error'] = 'Erro ao inativar a notícia!';

            header('location: ../noticia');
        }

        break;
}
?>