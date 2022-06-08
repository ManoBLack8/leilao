<?php include_once 'header.php'; ?>

<!-- Content wrapper -->
<div class="wrapper">
	<?php include_once 'sidebar.php'; ?>

	<!-- Content -->
    <div class="content">
    	<div class="title"><h5>Clientes</h5><span id="action-add"><a href="bot_adicionar.php" title="Adicionar" class="btn14 mr5"><img src="images/icons/dark/add.png" alt="adicionar" title="adicionar" /></a></span></div>
        
        <!-- Dynamic table -->
        <div class="table">
            <div class="head"><h5 class="iFrames">Lista de Usuários</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>nº lances</th>
                        <th>Status</th>
                        <th class="lastCol">Ações</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                    include_once ('includes/conexao.php');

                    $sql = " SELECT id, login, num_lances, nome, email, telefone, DATE_FORMAT(ultimo_login, '%d/%m/%Y %T') AS ultimo_login, status FROM usuarios WHERE status > 1 ";
                    $query = $pdo->query($sql);
                    $query = $query->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($query as $resultset) {
                        ?>
                        <tr class="gradeA">
                            <td><?php echo $resultset['nome']; ?></td>
                            <td><?php echo $resultset['login']; ?></td>
                            <td><?php echo $resultset['email']; ?></td>
                            <td><?php echo $resultset['telefone']; ?></td>
                            <td><?php echo $resultset['num_lances']; ?></td>
                            <td><?php echo ($resultset['status'] == 2) ? 'Ativo' : 'Inativo'; ?></td>
                            <td class="center">
                                <a href="bot_editar.php?id=<?= $resultset['id'] ?>" class="sepV_a" title="Editar"><img src="images/icons/dark/pencil.png" alt="" /></a>
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
