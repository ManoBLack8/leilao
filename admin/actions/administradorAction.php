<?php

session_start();
include('../includes/conexao.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        $nome = utf8_decode($_POST['nome']);
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $status = $_POST['status'];
        $criado_em = date('Y-m-d H:m:i');

        $query = "INSERT INTO admin VALUES (NULL, '" . $login . "', '" . $senha . "', '" . $nome . "', '" . $criado_em . "', " . $status . ")";
        $result = $pdo->query($query);

        header('location: ../administrador.php');

        break;

    case 'del':
        $id = $_REQUEST['id'];

        $query = "UPDATE admin SET status = -1 WHERE id = " . $id;
        $result = $pdo->query($query);

        header('location: ../administrador.php');

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        header("location: ../administrador_editar.php?id=$id");

        break;

    case 'edt':
        $id = $_POST['id'];
        $nome = utf8_decode($_POST['nome']);
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $status = $_POST['status'];

        $query = "UPDATE admin SET nome = '" . $nome . "', login = '" . $login . "', senha = '" . $senha . "', status = " . $status . " WHERE id = " . $id;
        $result = $pdo->query($query);

        header('location: ../administrador.php');
        

        break;

    case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE admin SET status = 1 WHERE id = " . $id;
        $result = $pdo->query($query);

        header('location: ../administrador.php');

        break;

    case 'itv':
        $id = $_REQUEST['id'];

        $query = "UPDATE admin SET status = 0 WHERE id = " . $id;
        $result = $pdo->query($query);
        
        header('location: ../administrador.php');

        break;
}
?>