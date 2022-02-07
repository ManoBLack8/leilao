<?php

session_start();
include('../includes/conexao.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        $num_lances = $_POST['numLance'];
        $preco = $_POST['preco'];

        $query = "INSERT INTO pacotes VALUES (NULL, " . $num_lances . ", " . $preco . ")";
        $result = mysql_query($query);

        $query = "SELECT id FROM pacotes WHERE num_lances = " . $num_lances . " AND preco = " . $preco;
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

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
        $result = mysql_query($query);

        $query = "SELECT * FROM pacotes WHERE id = " . $id;
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_error'] = 'Erro ao excluir o pacote de lance!';

            header('location: ../pacote');
        } else {
            $_SESSION['msg_success'] = 'Pacote de lance excluído com sucesso!';

            header('location: ../pacote');
        }

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        $query = "SELECT * FROM pacotes WHERE id = " . $id;
        $result = mysql_query($query);
        $pacote = mysql_fetch_assoc($result);

        $num_lances = $pacote['num_lances'];
        $preco = $pacote['preco'];

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
        $result = mysql_query($query);

        $query = "SELECT id FROM pacotes WHERE num_lances = " . $num_lances . " AND preco = " . $preco;
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Pacote de Lance editado com sucesso!';

            header('location: ../pacote');
        } else {
            $_SESSION['msg_error'] = 'Erro ao editar o pacote de lance!';

            header('location: ../pacote');
        }

        break;

    /*case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE admin SET status = 1 WHERE id = " . $id;
        $result = mysql_query($query);

        $query = "SELECT id FROM admin WHERE id = " . $id . " AND status = 1";
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

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
        $result = mysql_query($query);

        $query = "SELECT id FROM admin WHERE id = " . $id . " AND status = 0";
        $result = mysql_query($query);
        $num_result = mysql_num_rows($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Administrador inativado com sucesso!';

            header('location: ../administrador');
        } else {
            $_SESSION['msg_error'] = 'Erro ao inativar o administrador!';

            header('location: ../administrador');
        }

        break;*/
}
?>