<?php include_once 'header.php'; ?>

<!-- Content wrapper -->
<div class="wrapper">
	<?php include_once 'sidebar.php'; ?>

	<!-- Content -->
    <div class="content">
    	<div class="title"><h5>Categorias dos Leilões</h5><span id="action-add"><a href="categoria_adicionar" title="Adicionar" class="btn14 mr5"><img src="images/icons/dark/add.png" alt="adicionar" title="adicionar" /></a></span></div>
        
        <!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Lista de Categorias</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Número de leilões</th>
                        <th class="lastCol">Ações</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                    include_once ('includes/conexao.php');

                    $sql = " SELECT * FROM categorias ";
                    $query = mysql_query($sql);
                    
                    while ($resultset = mysql_fetch_array($query)):
                        $id = $resultset['id'];
                        ?>
                        <tr class="gradeA">
                            <td><?php echo $resultset['nome']; ?></td>
                            <td><?php echo $resultset['num_leiloes']; ?></td>
                            <td class="center">
                                <a href="actions/categoriaAction.php?action=sch_id&id=<?php echo $id; ?>" class="sepV_a" title="Editar"><img src="images/icons/dark/pencil.png" alt="editar" /></a>
                                <a href="actions/categoriaAction.php?action=del&id=<?php echo $id; ?>" title="Deletar"><img src="images/icons/dark/trash.png" alt="deletar" class="lastImg" /></a>
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
