<?php

session_start();
include('../includes/conexao.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        $nome = utf8_decode($_POST['nome']);

        $query = "INSERT INTO categorias VALUES (NULL, '" . $nome . "', 0 )";
        $result = $pdo->query($query);

        $query = "SELECT id FROM categorias WHERE nome = '" . $nome . "'";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Categoria cadastrada com sucesso!';

            header('location: ../categoria.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao cadastrar a categoria!';

            header('location: ../categoria.php');
        }

        break;

    case 'del':
        $id = $_REQUEST['id'];

        $query = "DELETE FROM categorias WHERE id = '$id'";
        $result = $pdo->query($query);

        $query = "SELECT * FROM categorias WHERE id = '$id'";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_error'] = 'Erro ao excluir a categoria!';

            header('location: ../categoria.php');
        } else {
            $_SESSION['msg_success'] = 'Categoria excluída com sucesso!';

            header('location: ../categoria.php');
        }

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        $query = "SELECT * FROM categorias WHERE id = " . $id;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $categoria) {
            $nome = $categoria['nome'];
        }

        header("location: ../categoria_editar.php?id=".$id."&nome=".$nome);

        break;

    case 'edt':
        $id = $_POST['id'];
        $nome = utf8_decode($_POST['nome']);

        $query = "UPDATE categorias SET nome = '" . $nome . "' WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM categorias WHERE nome = '" . $nome . "'";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Categoria editada com sucesso!';

            header('location: ../categoria.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao editar a categoria!';

            header('location: ../categoria.php');
        }

        break;
}
?>