<?php

session_start();
include('../includes/conexao.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        $nome = utf8_decode($_POST['nome']);

        $query = "INSERT INTO categorias VALUES (NULL, '" . $nome . "', 0 )";
        $result = mysql_query($query);

        $query = "SELECT id FROM categorias WHERE nome = '" . $nome . "'";
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Categoria cadastrada com sucesso!';

            header('location: ../categoria');
        } else {
            $_SESSION['msg_error'] = 'Erro ao cadastrar a categoria!';

            header('location: ../categoria');
        }

        break;

    case 'del':
        $id = $_REQUEST['id'];

        $query = "DELETE FROM categorias WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT * FROM categoria WHERE id = " . $id;
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_error'] = 'Erro ao excluir a categoria!';

            header('location: ../categoria');
        } else {
            $_SESSION['msg_success'] = 'Categoria excluída com sucesso!';

            header('location: ../categoria');
        }

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        $query = "SELECT * FROM categorias WHERE id = " . $id;
        $result = mysql_query($query);
        $categoria = mysql_fetch_assoc($result);

        $nome = $categoria['nome'];

        $_SESSION['id_edit'] = $id;
        $_SESSION['nome_edit'] = $nome;

        header("location: ../categoria_editar.php");

        break;

    case 'edt':
        $id = $_POST['id'];
        $nome = utf8_decode($_POST['nome']);

        $query = "UPDATE categorias SET nome = '" . $nome . "' WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT id FROM categorias WHERE nome = '" . $nome . "'";
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Categoria editada com sucesso!';

            header('location: ../categoria');
        } else {
            $_SESSION['msg_error'] = 'Erro ao editar a categoria!';

            header('location: ../categoria');
        }

        break;
}
?>