<?php require_once('header.php');
@session_start();
if (!$_SESSION['id_usuario']) {
    header('location: index.php');
}
$query = $pdo->query("SELECT * FROM pacotes");
$query = $query->fetchAll(PDO::FETCH_ASSOC);
$peso = 1;
?>
<style>
.produtinho form{
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
            <form action="https://pagseguro.uol.com.br/v2/checkout/payment.html" method="post">

                <input name="itemId1" type="hidden" value="<?= $pacote["id"] ?>">
                <input name="itemDescription1" type="hidden" value="<?= $pacote["nome"]?>">  
                <input name="itemAmount1" type="hidden" value="<?= $pacote["preco"]?>">  
                <input name="itemQuantity1" type="hidden" value="1"> 
                <input name="itemWeight1" type="hidden" value="<?= $peso ?>">

                <input name="receiverEmail" type="hidden" value="ederaddj@gmail.com">  
                <input name="currency" type="hidden" value="BRL">  
                <!-- Código de referência do pagamento no seu sistema (opcional) -->  
                <input name="reference" type="hidden" value="leilao">  
                
                <!-- Informações de frete (opcionais) -->  
                <input name="shippingType" type="hidden" value="3">

                <input name="shippingAddressCountry" type="hidden" value="BRA">  

                <div class="produto_imagem"><?= $pacote["img_src"] ?></div>
                <div class="produto_texto"><?= $pacote["nome"] ?></div>
                <div class="produto_preco"><button type="submit"><h1>R$ <?= number_format($pacote["preco"], 2, ',', '.'); ?></h1></button></div>
                
            </form>
        </div>
    <?php } ?>

</div>
<?php include('footer.php'); ?>