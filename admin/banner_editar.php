<?php include_once 'header.php'; ?>

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
            <input type="hidden" name="id" value="<?php echo $_SESSION['id_edit']?>"/>
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Administrador</h5></div>
                    <div class="rowElem noborder">
                        <label>Nome:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="nome" id="nome" value="<?php echo utf8_encode($_SESSION['nome_edit']) ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Login:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="login" id="login" value="<?php echo $_SESSION['login_edit'] ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Senha:</label>
                        <div class="formRight">
                            <input type="password" class="validate[required]" name="senha" id="senha" value="<?php echo $_SESSION['senha_edit'] ?>"/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Status:</label>
                        <div class="formRight">                        
                            <select name="status">
                                <option value="1" <?php echo ($_SESSION['status_edit']) ? 'selected = selected' : ''; ?>>Ativo</option>
                                <option value="0" <?php echo (!$_SESSION['status_edit']) ? 'selected = selected' : ''; ?>>Inativo</option>
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