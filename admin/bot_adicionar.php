<?php include_once 'header.php';
include('includes/conexao.php');?>
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Adicionar Bots</h5></div>
       
        <form action="../cadastrar_back.php?bot=1" method="post" id="valid" class="mainForm">
            <!-- Input text fields -->
            <input type="hidden" name="action" value="edt" />
            <input type="hidden" name="id" value="<?= $id ?>"/>
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Bots</h5></div>
                    <div class="rowElem noborder">
                        <label>Nome:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="nome" id="nome" value=""/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Login:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="login" id="login" value=""/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    <div class="rowElem noborder">
                        <label>Email:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="email" id="email" value=""/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    <div class="rowElem noborder">
                        <label>Telefone:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="telefone" id="telefone" value=""/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    <div class="rowElem noborder">
                        <label>CPF:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="cpf" id="cpf" value=""/>
                        </div>
                        <div class="fix"></div>
                    </div>
                    <div class="rowElem noborder">
                        <label>Data de nascimento:</label>
                        <div class="formRight">
                            <input type="text" class="datetimepicker" name="data_nascimento" id="nascimento" value=""/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Senha:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="senha" id="senha" value="12345678"/>
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Status:</label>
                        <div class="formRight">                        
                            <select name="status">
                                <option value="2">ativo</option>
                                <option value="3">ativo</option>
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
</div>
<?php include_once 'footer.php'; ?>