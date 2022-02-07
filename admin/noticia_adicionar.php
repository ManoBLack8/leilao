<?php include_once 'header.php'; ?>

<!-- Content wrapper -->
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Adicionar Notícia</h5></div>

        <!-- Form begins -->
        <form action="actions/noticiaAction.php" method="post" id="valid" class="mainForm" >
            <!-- Input text fields -->
            <input type="hidden" name="action" value="add" />
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Notícias</h5></div>
                    <div class="rowElem noborder">
                        <label>Título:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="titulo" id="titulo"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Slug:</label>
                        <div class="formRight">
                            <input type="text" name="slug" id="slug"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Conteudo:</label>
                        <textarea class="wysiwyg" rows="5" cols="" name="conteudo"></textarea>
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