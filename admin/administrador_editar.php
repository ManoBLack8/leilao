<?php include_once 'header.php';
include('includes/conexao.php');
$id = $_REQUEST['id'];

$query = "SELECT * FROM admin WHERE id = " . $id;
$result =  $pdo->query($query);
$result = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $admin) {
    $nome = $admin['nome'];
    $login = $admin['login'];
    $senha = $admin['senha'];
    $status = $admin['status'];
}
?>

<!-- Content wrapper -->
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Editar Administrador</h5></div>

        <!-- Form begins -->
        <form action="actions/administradorAction.php" method="post" id="valid" class="mainForm">
            <!-- Input text fields -->
            <input type="hidden" name="action" value="edt" />
            <input type="hidden" name="id" value="<?= $id ?>"/>
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Administrador</h5></div>
                    <div class="rowElem noborder">
                        <label>Nome:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="nome" id="nome" value="<?php echo utf8_encode($nome) ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Login:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="login" id="login" value="<?php echo $login ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Senha:</label>
                        <div class="formRight">
                            <input type="password" class="validate[required]" name="senha" id="senha" value="<?php echo $senha ?>"/>
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
<?php include_once 'footer.php'; ?>