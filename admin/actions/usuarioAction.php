<?php

session_start();
include('../includes/conexao.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'del':
        $id = $_REQUEST['id'];

        $query = "UPDATE usuarios SET status = -1 WHERE id = " . $id;
        $result = $pdo->query($query);

        header('location: ../usuario.php');

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        header("location: ../usuario_editar.php?id=$id");

        break;

    case 'edt':
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $nascimento = $_POST['nascimento'];
        $lances = $_POST['lances'];
        $senha = $_POST['senha'];
        $status = $_POST['status'];

        $query = "UPDATE usuarios SET  nome = '$nome', login = '$login', email = '$email', telefone = '$telefone', cpf = '$cpf', data_nascimento = '$nascimento', num_lances = '$lances', senha = '$senha', status = '$status' WHERE id = '$id' ";
        $result = $pdo->query($query);
        
        header('location: ../usuario.php');
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