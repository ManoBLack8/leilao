<?php require_once('header.php');
$query = $pdo->query("SELECT * FROM pacotes");
$query = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
.produtinho {
    border: solid 1px;
    width: 260px;
    height: 260px;
    padding: 10px;
    float: left;
    display: flex;
    margin: 20px 30px 0 0;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
}

.produto_preco button{
    width: 200px;
    height: 40px;
    border-radius: 20px;
    background: #0e279f;
    color: #fff;
    font-size: 24px;
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
            <div class="produto_imagem"><?= $pacote["img_src"] ?></div>
            <div class="produto_texto"><?= $pacote["nome"] ?></div>
            <div class="produto_preco"><button><h1>R$ <?= number_format($pacote["preco"], 2, ',', '.'); ?></h1></button></div>

        </div>
    <?php } ?>

</div>
<?php include('footer.php'); ?>