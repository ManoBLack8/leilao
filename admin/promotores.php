<?php include_once 'header.php'; ?>

<!-- Content wrapper -->
<div class="wrapper">
	<?php include_once 'sidebar.php'; ?>

	<!-- Content -->
    <div class="content">
        <div class="title"><h5>Promotores</h5><span id="action-add"><a href="promotores_adicionar.php" title="Adicionar" class="btn14 mr5"><img src="images/icons/dark/add.png" alt="adicionar" title="adicionar" /></a></span></div>
        
        <!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Lista de promotores</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th class="lastCol">Ações</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                    include_once ('includes/conexao.php');

                    $sql = " SELECT * FROM promotores ";
                    $query = $pdo->query($sql);
                    $query = $query->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($query as $resultset) {
                        ?>
                        <tr class="gradeA">
                            <td><?php echo $resultset['id']; ?></td>
                            <td><?php echo $resultset['nome']; ?></td>
                            <td>https://www.leilaoduarte.com.br/promo.php?id=<?= $resultset['id']; ?>&nome=<?= $resultset['nome']; ?></td>
                            <td><?php echo ($resultset['status'] == 1) ? 'Ativo' : 'Inativo'; ?></td>
                            <td class="center">
                                <a href="#" class="sepV_a" title="Editar"><img src="images/icons/dark/pencil.png" alt="" /></a>
                                <a href="#" class="sepV_a" title="Visualizar"><img src="images/icons/dark/preview.png" alt="" /></a>
                                <a href="#" title="Deletar"><img src="images/icons/dark/trash.png" alt="" class="lastImg" /></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="fix"></div>
</div>
<?php include_once 'footer.php'; ?>
