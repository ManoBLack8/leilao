<?php include_once 'header.php'; ?>

<!-- Content wrapper -->
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Adicionar Pacotes de Lances</h5></div>

        <!-- Form begins -->
        <form action="actions/pacoteAction.php" method="post" id="valid" class="mainForm">
            <!-- Input text fields -->
            <input type="hidden" name="action" value="add" />
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Pacotes de Lances</h5></div>
                    <div class="rowElem noborder">
                        <label>Número de Lances:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required,custom[onlyNumberSp]]" name="numLance" id="numLance"/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Preço:</label>
                        <div class="formRight">
                            <input type="text" id="s2" class="validate[required]" name="preco" value="0.00" />
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