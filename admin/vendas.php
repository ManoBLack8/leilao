<?php include_once 'header.php'; ?>

<!-- Content wrapper -->
<div class="wrapper">
	<?php include_once 'sidebar.php'; ?>

	<!-- Content -->
    <div class="content">
    	<div class="title"><h5>Clientes</h5></div>
        
        <!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Lista de Usuários</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>id do usuario</th>
                        <th>codigo</th>
                        <th>data</th>
                        <th>promotor</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                    include_once ('includes/conexao.php');

                    $sql = " SELECT *, compras.status as status FROM compras LEFT JOIN promotores ON (promotores.id = compras.promotor_id)";
                    $query = $pdo->query($sql);
                    $query = $query->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($query as $resultset) {
                        ?>
                        <tr class="gradeA">
                            <td><?= $resultset['id_usuario']; ?></td>
                            <td><?= $resultset['transacao']; ?></td>
                            <td><?= $resultset['data_envio']; ?></td>
                            <td><?= $resultset['nome']; ?></td>
                            <td><?= $resultset['status']; ?></td>
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
