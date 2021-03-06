<?php include_once 'header.php';
include('includes/conexao.php');
$id = $_REQUEST['id'];

$query = "SELECT * FROM paginas WHERE id = " . $id;
$result = $pdo->query($query);
$result = $result->fetchAll(PDO::FETCH_ASSOC);
$admin = count($result);

foreach ($result as $admin) {
    $titulo = $admin['titulo'];
    $slug = $admin['slug'];
    $conteudo = $admin['conteudo'];
    $status = $admin['status'];
}
?>

<!-- Content wrapper -->
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Editar Página</h5></div>

        <!-- Form begins -->
        <form action="actions/paginaAction.php" method="post" id="valid" class="mainForm">
            <!-- Input text fields -->
            <input type="hidden" name="action" value="edt" />
            <input type="hidden" name="id" value="<?php echo $_SESSION['id_edit']?>"/>
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Páginas</h5></div>
                    <div class="rowElem noborder">
                        <label>Título:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="titulo" id="titulo" value="<?php echo utf8_encode($titulo) ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Slug:</label>
                        <div class="formRight">
                            <input type="text" name="slug" id="slug" value="<?php echo $slug ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Conteúdo:</label>
                        <textarea class="wysiwyg" rows="5" cols="" name="conteudo"><?php echo $conteudo ?></textarea>
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
<?php include_once 'footer.php'; ?>