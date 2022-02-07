<?php

session_start();
include('../includes/conexao.php');
include('../includes/funcoes.php');
include('../includes/simple_image.php');

$acao = $_REQUEST['action'];

switch ($acao) {
    case 'add':
        $valor_float = floatval(str_replace(',', '', $_POST['valor']));
        $img_src = "";

        $id_admin = $_POST['id_admin'];
        $titulo = utf8_decode($_POST['titulo']);
        $slug = create_slug($_POST['titulo']);
        $descricao = utf8_decode($_POST['descricao']);
        $duracao = $_POST['duracao'];
        $comeca_em = toMysqlDateTime($_POST['data_comeca_em']);
        $finaliza_em = NULL;
        $quantidade = $_POST['quantidade'];
        $valor = number_format($valor_float, 2, '.', '');
        $frete = $_POST['frete'];
        $arremate = $_POST['arremate'];
        $destaque = $_POST['destaque'];
        $num_lances = 0;
        $finalizado = 0;
        $status = $_POST['status'];
        $categoria = $_POST['categoria'];

        if (!empty($_FILES) && !$_FILES['img']['error'][0]) {
            $dir = '../uploads/leilao/img/';
            $dir_thumb = '../uploads/leilao/thumb/';

            $img = explode(".", $_FILES["img"]["name"][0]);
            $nome_imagem = $img[0];
            $ext_imagem = $img[1];

            $cod = substr(md5(uniqid(time())), 0, 10);

            $src_imagem = $cod . "." . $ext_imagem;
            $img_src = $src_imagem;

            $image = new SimpleImage();
            $image_thumb = new SimpleImage();

            $tmp_name = $_FILES["img"]["tmp_name"][0];

            $file = $dir . basename($src_imagem);
            $file_thumb = $dir_thumb . basename($src_imagem);

            $image->load($tmp_name);
            $image->resize(215, 200);
            $image->save($file);

            $image_thumb->load($tmp_name);
            $image_thumb->resize(100, 70);
            $image_thumb->save($file_thumb);
        }

        $query = "INSERT INTO leiloes VALUES (NULL, " . $id_admin . ", '" . $categoria . "', '" . $titulo . "', '" . $descricao . "', " . $duracao . ", '" . $comeca_em . "', '" . $finaliza_em . "', " . $quantidade . ", '" . $valor . "', " . $num_lances . ", " . $frete . ", " . $arremate . ", " . $destaque . ", " . $status . ", NULL, 0)";
        $result = $pdo->query($query);


        $query = "SELECT id FROM leiloes WHERE titulo = '" . $titulo . "' AND descricao = '" . $descricao . "'";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            if (!empty($_FILES['img_sec'])) {
                $leilao = $result;
                $id_leilao = $leilao['id'];

                foreach ($_FILES["img_sec"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES["img_sec"]["tmp_name"][$key];

                        $nome = explode(".", $_FILES["img_sec"]["name"][$key]);
                        $nome_imagem = $nome[0];
                        $ext_imagem = $nome[1];

                        $cod = substr(md5(uniqid(time())), 0, 10);

                        $src_imagem = $cod . "." . $ext_imagem;

                        $file = $dir . basename($src_imagem);
                        $file_thumb = $dir_thumb . basename($src_imagem);

                        $image->load($tmp_name);
                        $image->resize(215, 200);
                        $image->save($file);

                        $image_thumb->load($tmp_name);
                        $image_thumb->resize(100, 70);
                        $image_thumb->save($file_thumb);

                        $query = "INSERT INTO imagens VALUES (NULL, " . $id_leilao . ", '" . $src_imagem . "')";
                        $result = $pdo->query($query);
                        $result = $result->fetchAll(PDO::FETCH_ASSOC);
                    }
                }
            }

            $_SESSION['msg_success'] = 'Leilão cadastrado com sucesso!';

         header('location: ../leilao.php');
        }

        break;

    case 'del':
        $id = $_REQUEST['id'];

        $query = "UPDATE leiloes SET  status = '-1' WHERE id = $id";
        $result = $pdo->query($query);

        $query = "SELECT * FROM leiloes WHERE id = " . $id;
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_error'] = 'Erro ao excluir o leilão!';

            header('location: ../leilao.php');
        } else {
            $_SESSION['msg_success'] = 'Leilão excluído com sucesso!';

            header('location: ../leilao.php');
        }

        break;

    case 'sch_id':
        $id = $_REQUEST['id'];

        header("location: ../leilao_editar.php?id=$id");

        break;

    case 'edt':
        $valor_float = floatval(str_replace(',', '', $_POST['valor']));

        $id = $_POST['id'];
        $id_admin = $_POST['id_admin'];
        $categoria = $_POST['categoria'];
        $titulo = utf8_decode($_POST['titulo']);
        $slug = create_slug($_POST['titulo']);
        $descricao = utf8_decode($_POST['descricao']);
        $duracao = $_POST['duracao'];
        $comeca_em = toMysqlDateTime($_POST['data_comeca_em']);
        $finaliza_em = getFinalDate($_POST['data_comeca_em'], $duracao);
        $quantidade = $_POST['quantidade'];
        $valor = number_format($valor_float, 2, '.', '');
        $frete = $_POST['frete'];
        $arremate = $_POST['arremate'];
        $destaque = $_POST['destaque'];
        $num_lances = 0;
        $status = $_POST['status'];

        if (!empty($_FILES) && !$_FILES['img']['error'][0]) {
            $dir = '../uploads/leilao/img/';
            $dir_thumb = '../uploads/leilao/thumb/';

            $img = explode(".", $_FILES["img"]["name"][0]);
            $nome_imagem = $img[0];
            $ext_imagem = $img[1];

            $cod = substr(md5(uniqid(time())), 0, 10);

            $src_imagem = $cod . "." . $ext_imagem;
            $img_src = $src_imagem;

            $image = new SimpleImage();
            $image_thumb = new SimpleImage();

            $tmp_name = $_FILES["img"]["tmp_name"][0];

            $file = $dir . basename($src_imagem);
            $file_thumb = $dir_thumb . basename($src_imagem);

            $image->load($tmp_name);
            $image->resize(215, 200);
            $image->save($file);

            $image_thumb->load($file);
            $image_thumb->resize(100, 70);
            $image_thumb->save($file_thumb);

            $query = "UPDATE leiloes SET id_admin = " . $id_admin . ", titulo = '" . $titulo . "', descricao = '" . $descricao . "', img_src = '" . $img_src . "', duracao = " . $duracao . ", comeca_em = '" . $comeca_em . "', quantidade_item = " . $quantidade . ", valor_item = '" . $valor . "', frete = " . $frete . ", arremate = " . $arremate . ", destaque = " . $destaque . ", status = " . $status . " WHERE id = " . $id;
            $result = $pdo->query($query);
        } else {
            $query = "UPDATE leiloes SET id_admin = " . $id_admin . ", titulo = '" . $titulo . "', descricao = '" . $descricao . "', duracao = " . $duracao . ", comeca_em = '" . $comeca_em . "', quantidade_item = " . $quantidade . ", valor_item = '" . $valor . "', frete = " . $frete . ", arremate = " . $arremate . ", destaque = " . $destaque . ", status = " . $status . " WHERE id = " . $id;
            $result = $pdo->query($query);
        }

        $query = "SELECT id FROM leiloes WHERE titulo = '" . $titulo . "' AND descricao = '" . $descricao . "'";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        
        $_SESSION['msg_error'] = '';

        header('location: ../leilao.php');
        

        break;

    case 'atv':
        $id = $_REQUEST['id'];

        $query = "UPDATE leiloes SET status = 1 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM leiloes WHERE id = " . $id . " AND status = 1";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Leilão ativado com sucesso!';

            header('location: ../leilao.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao ativar o leilão!';

            header('location: ../leilao.php');
        }

        break;

    case 'itv':
        $id = $_REQUEST['id'];

        $query = "UPDATE leiloes SET status = 0 WHERE id = " . $id;
        $result = $pdo->query($query);

        $query = "SELECT id FROM leiloes WHERE id = " . $id . " AND status = 0";
        $result = $pdo->query($query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $num_result = count($result);

        if ($num_result > 0) {
            $_SESSION['msg_success'] = 'Leilão inativado com sucesso!';

            header('location: ../leilao.php');
        } else {
            $_SESSION['msg_error'] = 'Erro ao inativar o leilão!';

            header('location: ../leilao.php');
        }

        break;
}
?>