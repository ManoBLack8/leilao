<?php include_once 'header.php'; ?>

<!-- Content wrapper -->
<div class="wrapper">
    <?php include_once 'sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <div class="title"><h5>Notícias</h5><span id="action-add"><a href="noticia_adicionar" title="Adicionar" class="btn14 mr5"><img src="images/icons/dark/add.png" alt="adicionar" title="adicionar" /></a></span></div>

        <?php if(isset($_SESSION['msg_error']) && !empty($_SESSION['msg_error'])): ?>
            <div class="nNote nFailure hideit">
                <p><strong>ERRO: </strong>Oops. <?php echo $_SESSION['msg_error']; ?></p>
            </div>
        <?php elseif(isset($_SESSION['msg_success']) && !empty($_SESSION['msg_success'])): ?>
            <div class="nNote nSuccess hideit">
                <p><strong>SUCESSO: </strong><?php echo $_SESSION['msg_success']; ?></p>
            </div>
        <?php endif; ?>

        <!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Lista de Notícias</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Slug</th>
                        <th>Data da Postagem</th>
                        <th>Status</th>
                        <th class="lastCol">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once ('includes/conexao.php');

                    $sql = " SELECT id, titulo, slug, DATE_FORMAT(data_postagem, '%d/%m/%Y %T')AS data_postagem, status FROM noticias ";
                    $query = mysql_query($sql);

                    while ($resultset = mysql_fetch_array($query)):
                        $id = $resultset['id'];
                        ?>
                        <tr class="gradeA">
                            <td><?php echo utf8_encode($resultset['titulo']); ?></td>
                            <td><?php echo $resultset['slug']; ?></td>
                            <td><?php echo $resultset['data_postagem']; ?></td>
                            <td><?php echo ($resultset['status'] == 1) ? 'Ativo' : 'Inativo'; ?></td>
                            <td class="center">
                                <a href="actions/noticiaAction.php?action=sch_id&id=<?php echo $id; ?>" class="sepV_a" title="Editar"><img src="images/icons/dark/pencil.png" alt="editar" /></a>
                                <?php echo (!$resultset['status']) ? '<a href="actions/noticiaAction.php?action=atv&id=' . $id . '" class="sepV_a" title="Ativar"><img src="images/icons/dark/check.png" alt="ativar"/></a>' : '<a href="actions/noticiaAction.php?action=itv&id=' . $id . '" class="sepV_a" title="Inativar"><img src="images/icons/dark/close.png" alt="inativar" /></a>'; ?>
                                <a href="actions/noticiaAction.php?action=del&id=<?php echo $id; ?>" title="Deletar"><img src="images/icons/dark/trash.png" alt="deletar" class="lastImg" /></a>
                            </td>
                        </tr>
                        <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="fix"></div>
</div>

<?php include_once 'footer.php'; ?>