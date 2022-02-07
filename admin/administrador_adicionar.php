<?php include_once 'header.php'; ?>

<!-- Content wrapper -->
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Adicionar Administrador</h5></div>

        <!-- Form begins -->
        <form action="actions/administradorAction.php" method="post" id="valid" class="mainForm">
            <!-- Input text fields -->
            <input type="hidden" name="action" value="add" />
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Administrador</h5></div>
                    <div class="rowElem noborder">
                        <label>Nome:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="nome" id="nome"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Login:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="login" id="login"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Senha:</label>
                        <div class="formRight">
                            <input type="password" class="validate[required]" name="senha" id="senha"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Status:</label>
                        <div class="formRight">                        
                            <select name="status">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
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