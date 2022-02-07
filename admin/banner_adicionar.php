<?php include_once 'header.php'; ?>

<!-- Content wrapper -->
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Adicionar Banner</h5></div>

        <!-- Form begins -->
        <form action="actions/bannerAction.php" method="post" id="valid" class="mainForm" enctype="multipart/form-data" >
            <!-- Input text fields -->
            <input type="hidden" name="action" value="add" />
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Banner</h5></div>
                    <div class="rowElem noborder">
                        <label>Título:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="titulo" id="titulo"/>
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
                            <input type="text" class="validate[required,custom[onlyNumberSp]]" name="ordem" id="ordem" />
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