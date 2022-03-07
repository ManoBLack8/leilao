<?php require_once('header.php');
@session_start();
?>
<style>
.produtinho{
    border: solid 1px;
    padding: 10px;
    float: left;
    display: flex;
    margin: 20px 30px 0 0;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    background: #0e279f;
}

.produtinho h1{
    font-size: 24px;
    font-weight: 600;
    color: #fff;
}
.produto_texto{
    font-size: 24px;
    color: #343434;
}
</style>
<div class="tel_de_vendas">
    <?php foreach ($query as $pacote) {
        
     ?>
        <div class="produtinho">
            <video controls src="admin/uploads/depoimentos/videos/<?= $pacote['depoimento'] ?>"></video>
            <hr>
            <h1><?= $pacote['titulo'] ?></h1>
        </div>
    <?php } ?>

</div>
<?php include('footer.php'); ?>