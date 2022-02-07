<?php include_once 'header.php';
include_once ('includes/conexao.php');
$id = $_REQUEST['id'];
$query = 'SELECT * FROM leiloes WHERE id = ' . $id;
$result = $pdo->query($query);
$result = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $leilao) {

    $categoria = $leilao['id_categoria'];
    $titulo = $leilao['titulo'];
    $descricao = $leilao['descricao'];
    $duracao = $leilao['duracao'];
    $comeca_em = $leilao['comeca_em'];
    $quantidade = $leilao['quantidade_item'];
    $valor = $leilao['valor_item'];
    $frete = $leilao['frete'];
    $arremate = $leilao['arremate'];
    $destaque = $leilao['destaque'];
    $status = $leilao['status'];
}
$sql = " SELECT * FROM categorias ";
$query = $pdo->query($sql);
$query = $query->fetchAll(PDO::FETCH_ASSOC);
 ?>

<!-- Content wrapper -->
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Editar Leilão</h5></div>

        <!-- Form begins -->
        <form action="actions/leilaoAction.php?acao=edt" method="post" id="valid" class="mainForm">
            <!-- Input text fields -->
            <input type="hidden" name="action" value="edt" />
            <input type="hidden" name="id" value="<?= $id?>"/>
            <input type="hidden" name="id_admin" value="<?= $_SESSION['id_admin'] ?>" />
            <fieldset>
                <div class="widget">
                    <div class="head"><h5 class="iList">Leilão</h5></div>
                    <div class="rowElem noborder">
                        <label>Categoria:</label>
                        <div class="formRight">
                            <select name="categoria">
                                <?php

                                foreach ($query as $resultset) {
                                    ?>
                                    <option value="<?= $resultset['id']; ?>"><?= $resultset['nome']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    <div class="rowElem noborder">
                        <label>Título:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required]" name="titulo" id="titulo" value="<?php echo utf8_encode($titulo) ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Descrição:</label>
                        <textarea class="wysiwyg" rows="5" cols="" name="descricao"><?php echo utf8_encode($descricao) ?></textarea>  
                    </div>
                    <div class="rowElem noborder">
                        <label>Imagem principal:</label>
                        <div class="formRight">
                            <input type="file" id="img" name="img[]" />
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Duração:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required,custom[onlyNumberSp]]" name="duracao" id="duracao" value="<?= $duracao ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Ínicio:</label>
                        <div class="formRight">
                            <input type="text" class="datetimepicker" name="data_comeca_em" value="<?= $comeca_em ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Quantidade:</label>
                        <div class="formRight">
                            <input type="text" class="validate[required,custom[onlyNumberSp]]" name="quantidade" id="quantidade" value="<?= $quantidade ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Valor:</label>
                        <div class="formRight">
                            <input type="text" id="s2" class="validate[required]" name="valor" value="<?= $valor ?>" />
                        </div>
                        <div class="fix"></div>
                    </div>

                    <div class="rowElem noborder">
                        <label>Frete Grátis:</label>
                        <div class="formRight">                        
                            <select name="frete">
                                <option value="1" <?= ($frete) ? 'selected = selected' : ''; ?> >Sim</option>
                                <option value="0" <?= (!$frete) ? 'selected = selected' : ''; ?> >Não</option>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Arremate Grátis:</label>
                        <div class="formRight">                        
                            <select name="arremate">
                                <option value="1" <?= ($arremate) ? 'selected = selected' : ''; ?> >Sim</option>
                                <option value="0" <?= (!$arremate) ? 'selected = selected' : ''; ?> >Não</option>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Destaque:</label>
                        <div class="formRight">                        
                            <select name="destaque">
                                <option value="1" <?= ($destaque) ? 'selected = selected' : ''; ?> >Sim</option>
                                <option value="0" <?= (!$destaque) ? 'selected = selected' : ''; ?> >Não</option>
                            </select>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem noborder">
                        <label>Status:</label>
                        <div class="formRight">                        
                            <select name="status">
                                <option <?= ($status) ? 'selected = selected' : ''; ?> value="1">Ativo</option>
                                <option <?= (!$status) ? 'selected = selected' : ''; ?> value="0">Inativo</option>
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