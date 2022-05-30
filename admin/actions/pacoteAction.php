<?php

session_start();
include('../includes/conexao.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        $num_lances = $_POST['numLance'];
        $preco = $_POST['preco'];
        $titulo = $_POST['titulo'];
        $img_src =$_FILES["img"]["name"][0];

        $caminho = '../uploads/pacotes/' .@$_FILES["img"]["name"][0];
        if (@$_FILES["img"]["name"][0] == ""){
        $imagem = "sem-foto.jpg";
        }else{
        $imagem = @$_FILES["img"]["name"][0]; 
        }

        $imagem_temp = @$_FILES["img"]['tmp_name'][0]; 

        $ext = pathinfo($imagem, PATHINFO_EXTENSION);   
        if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif' or $ext == 'PNG'){ 
        move_uploaded_file($imagem_temp, $caminho);
        }else{
            echo 'Extensão de Imagem não permitida!';
            exit();
        }


        $query = "INSERT INTO pacotes VALUES (NULL, '$titulo', '$img_src', '$num_lances', '$preco')";
        $result = $pdo->query($query);

        $query = "SELECT id FROM pacotes WHERE num_lances = " . $num_lances . " AND preco = " . $preco;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Pacote de Lance cadastrado com sucesso!';

            header('location: ../pacote');
        } else {
            $_SESSION['msg_error'] = 'Erro ao cadastrar o pacote de lance!';

            header('location: ../pacote');
        }

        break;

    case 'del':
        $id = $_REQUEST['id'];

        $query = "DELETE FROM pacotes WHERE id = " . $id;
        $result = $pdo->query($query);

        header('location: ../pacote.php');
        

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        $query = "SELECT * FROM pacotes WHERE id = " . $id;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $pacote = count($result);

        foreach ($result as $pacote) {
            $num_lances = $pacote['num_lances'];
            $preco = $pacote['preco'];
        }
        

        $_SESSION['id_edit'] = $id;
        $_SESSION['num_lances_edit'] = $num_lances;
        $_SESSION['preco_edit'] = $preco;

        header("location: ../pacote_editar.php");

        break;

    case 'edt':
        $id = $_POST['id'];
        $num_lances = $_POST['numLance'];
        $preco = $_POST['preco'];

        $query = "UPDATE pacotes SET num_lances = " . $num_lances . ", preco = " . $preco . " WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM pacotes WHERE num_lances = " . $num_lances . " AND preco = " . $preco;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Pacote de Lance editado com sucesso!';

            header('location: ../pacote.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao editar o pacote de lance!';

            header('location: ../pacote.php');
        }

        break;

    case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE admin SET status = 1 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM admin WHERE id = " . $id . " AND status = 1";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Administrador ativado com sucesso!';

            header('location: ../administrador');
        } else {
            $_SESSION['msg_error'] = 'Erro ao ativar o administrador!';

            header('location: ../administrador');
        }

        break;

    case 'itv':
        $id = $_REQUEST['id'];

        $query = "UPDATE admin SET status = 0 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM admin WHERE id = " . $id . " AND status = 0";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Administrador inativado com sucesso!';

            header('location: ../administrador');
        } else {
            $_SESSION['msg_error'] = 'Erro ao inativar o administrador!';

            header('location: ../administrador');
        }

        break;
}
?>