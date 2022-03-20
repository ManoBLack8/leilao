<?php

session_start();
include('../includes/conexao.php');
include('../includes/simple_image.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        if(!empty($_FILES) && !$_FILES['banner']['error'][0]){
            $dir = '../uploads/banner/img/';
            $dir_thumb = '../uploads/banner/thumb/';
            
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
            $image->resize(700, 242);
            $image->save($file);
            
            $image_thumb->load($file);
            $image_thumb->scale(25);
            $image_thumb->save($file_thumb);
            
            $query = "INSERT INTO banners VALUES (NULL, '" . $titulo . "', '" . $src_imagem . "', " . $ordem . ", " . $status . ")";
            $result = $pdo->query($query);

            header('location: ../banner.php');

        } else{
            $_SESSION['msg_error'] = 'Erro ao cadastrar o banner!';

            header('location: ../banner.php');
        }

        break;

    case 'del':
        $id = $_REQUEST['id'];
        $query = "DELETE FROM banners WHERE id = '$id' ";
        $result = $pdo->query($query);

        header('location: ../banner.php');

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];
        header("location: ../banner_editar.php?id='$id'");

        break;

    case 'edt':
        $id = $_POST['id'];
        $titulo = utf8_decode($_POST['titulo']);
        $ordem = $_POST['ordem'];
        $status = $_POST['status'];

        if(!empty($_FILES) && !$_FILES['banner']['error'][0]){
            $dir = '../uploads/banner/img/';
            $dir_thumb = '../uploads/banner/thumb/';
            
            $img = explode(".", $_FILES["banner"]["name"][0]);
            $nome_imagem = $img[0];
            $ext_imagem = $img[1];
            
            $cod = substr(md5(uniqid(time())), 0, 10);
            
            $src_imagem = $cod.".".$ext_imagem;
            
            $query = "UPDATE banners SET titulo = '" . $titulo . "', img_src = '" . $src_imagem . "', ordem = '" . $ordem . "', status = " . $status . " WHERE id = " . $id;
            $result = $pdo->query($query);
            
            $image = new SimpleImage();
            $image_thumb = new SimpleImage();
            
            $tmp_name = $_FILES["banner"]["tmp_name"][0];
            
            $file = $dir . basename($src_imagem);
            $file_thumb = $dir_thumb . basename($src_imagem);

            $image->load($tmp_name);
            $image->resize(700, 242);
            $image->save($file);
            
            $image_thumb->load($file);
            $image_thumb->scale(25);
            $image_thumb->save($file_thumb);
            
            $img_antiga = $_POST['img_antiga'];
            $img_antiga = $dir.'.'.$img_antiga;
            
            unlink($dir . $img_antiga);
            unlink($dir_thumb . $img_antiga);
        } else{
            $query = "UPDATE banners SET titulo = '" . $titulo . "', ordem = '" . $ordem . "', status = " . $status . " WHERE id = " . $id;
            $result = $pdo->query($query);
        }

        header('location: ../banner.php');
        break;

    case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE banners SET status = 1 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM banners WHERE id = " . $id . " AND status = 1";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        header('location: ../banner.php');
    
        break;

    case 'itv':
        $id = $_REQUEST['id'];

        $query = "UPDATE banners SET status = 0 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM banners WHERE id = " . $id . " AND status = 0";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        header('location: ../banner.php');
        

        break;
}
?>