<?php include_once 'header.php';
include('includes/conexao.php');
$id = $_REQUEST['id'];
$query = "SELECT * FROM banners WHERE id = " . $id;
$result = $pdo->query($query);
$result = $result->fetchAll(PDO::FETCH_ASSOC);
$admin = count($result);

foreach ($result as $banner) {
    $titulo = $banner['titulo'];
    $ordem = $banner['ordem'];
    $status = $banner['status'];
}
?>

<!-- Content wrapper -->
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Editar Administrador</h5></div>

        <!-- Form begins -->
        <form action="actions/bannerAction.php" method="post" id="valid" class="mainForm">
            <!-- Input text fields -->
            <input type="hidden" name="action" value="edt" />
            <input type="hidden" name="id" value="<?php echo $id ?>"/>
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Banner</h5></div>
                    <div class="rowElem noborder">
                        <label>Título:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="titulo" id="titulo" value="<?= $titulo ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Imagem:</label>
                        <div class="formRight">
                            <input type="file" id="banner" name="banner[]" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Ordem:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required,custom[onlyNumberSp]]" name="ordem" id="ordem" value="<?= $ordem ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Status:</label>
                        <div class="formRight">
                            <select name="status">
                                <option value="1" <?php echo ($status) ? 'selected = selected' : ''; ?>>Ativo</option>
                                <option value="0" <?php echo (!$status) ? 'selected = selected' : ''; ?>>Inativo</option>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <input type="submit" value="Cadastrar" class="greyishBtn submitForm" />
                    <div class="fix"></div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="fix"></div>
</div>
<?php
//excluindo as informações do usuário usadas para edição
unset($_SESSION['id_edit']);
unset($_SESSION['nome_edit']);
unset($_SESSION['login_edit']);
unset($_SESSION['senha_edit']);
unset($_SESSION['status_edit']);
?>
<?php include_once 'footer.php'; ?>