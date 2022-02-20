<?php

session_start();
include('../includes/conexao.php');
include('../includes/simple_image.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        if(!empty($_FILES) && !$_FILES['banner']['error'][0]){
            $dir = '../uploads/parceiros/img/';
            $dir_thumb = '../uploads/parceiros/thumb/';
            
            $img = explode(".", $_FILES["banner"]["name"][0]);
            $nome_imagem = $img[0];
            $ext_imagem = $img[1];
            
            $cod = substr(md5(uniqid(time())), 0, 10);
            
            $titulo = utf8_decode($_POST['titulo']);
            $src_imagem = $cod.".".$ext_imagem;
            $ordem = $_POST['ordem'];
            $status = $_POST['status'];

            $image = new SimpleImage();
            $image_thumb = new SimpleImage();
            
            $tmp_name = $_FILES["banner"]["tmp_name"][0];
            
            $file = $dir . basename($src_imagem);
            $file_thumb = $dir_thumb . basename($src_imagem);

            $image->load($tmp_name);
            $image->save($file);
            
            $image_thumb->load($file);
            $image_thumb->scale(25);
            $image_thumb->save($file_thumb);
            
            $query = "INSERT INTO parceiros VALUES (NULL, '" . $titulo . "', '" . $src_imagem . "', " . $ordem . ", " . $status . ")";
            $result = $pdo->query($query);

            header('location: ../parceiros.php');

        } else{
            $_SESSION['msg_error'] = 'Erro ao cadastrar o banner!';

            header('location: ../parceiros.php');
        }

        break;

    case 'del':
        $id = $_REQUEST['id'];
        $dir = '../uploads/parceiros/img/';
        $dir_thumb = '../uploads/parceiros/thumb/';
        
        $query = "SELECT * FROM parceiros WHERE id = " . $id;
        $result = $pdo->query($query);
        $result = $result->fetchAll($result);
        $num_result = count($result);
        
        if ($num_result > 0) {
            $banner = $result[0];
            $img_src = $banner['logo'];
            
            unlink($dir . $img_src);
            unlink($dir_thumb . $img_src);
        }
        
        $query = "DELETE FROM parceiros WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT * FROM parceiros WHERE id = " . $id;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_error'] = 'Erro ao excluir o banner!';

            header('location: ../parceiros.php');
        } else {
            $_SESSION['msg_success'] = 'Banner excluído com sucesso!';

            header('location: ../parceiros.php');
        }

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        $query = "SELECT * FROM parceiros WHERE id = " . $id;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $banner) {
            $titulo = $banner['nome'];
            $img_src = $banner['logo'];
            $ordem = $banner['ordem'];
            $status = $banner['status'];
        }

        header("location: ../parceiros_editar.php");

        break;

    case 'edt':
        $id = $_POST['id'];
        $titulo = utf8_decode($_POST['titulo']);
        $ordem = $_POST['ordem'];
        $status = $_POST['status'];

        if(!empty($_FILES) && !$_FILES['banner']['error'][0]){
            $dir = '../uploads/parceiros/img/';
            $dir_thumb = '../uploads/parceiros/thumb/';
            
            $img = explode(".", $_FILES["banner"]["name"][0]);
            $nome_imagem = $img[0];
            $ext_imagem = $img[1];
            
            $cod = substr(md5(uniqid(time())), 0, 10);
            
            $src_imagem = $cod.".".$ext_imagem;
            
            $query = "UPDATE parceiros SET nome = '" . $titulo . "', logo = '" . $src_imagem . "', ordem = '" . $ordem . "', status = " . $status . " WHERE id = " . $id;
            $result = $pdo->query($query);
            
            $image = new SimpleImage();
            $image_thumb = new SimpleImage();
            
            $tmp_name = $_FILES["banner"]["tmp_name"][0];
            
            $file = $dir . basename($src_imagem);
            $file_thumb = $dir_thumb . basename($src_imagem);

            $image->load($tmp_name);
            $image->save($file);
            
            $image_thumb->load($file);
            $image_thumb->scale(25);
            $image_thumb->save($file_thumb);
            
            $img_antiga = $_POST['img_antiga'];
            $img_antiga = $dir.'.'.$img_antiga;
            
            unlink($dir . $img_antiga);
            unlink($dir_thumb . $img_antiga);
        } else{
            $query = "UPDATE parceiros SET nome = '" . $titulo . "', ordem = '" . $ordem . "', status = " . $status . " WHERE id = " . $id;
            $result = $pdo->query($query);
        }

        $query = "SELECT id FROM banners WHERE titulo = '" . $titulo . "' AND ordem = '" . $ordem . "' AND status = " . $status;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Banner editado com sucesso!';

            header('location: ../parceiros.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao editar o banner!';

            header('location: ../parceiros.php');
        }

        break;

    case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE parceiros SET status = 1 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM parceiros WHERE id = " . $id . " AND status = 1";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        header('location: ../parceiros.php');
    
        break;

    case 'itv':
        $id = $_REQUEST['id'];

        $query = "UPDATE parceiros SET status = 0 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM parceiros WHERE id = " . $id . " AND status = 0";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        header('location: ../parceiros.php');
        

        break;
}
?>