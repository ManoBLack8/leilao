<?php require_once("header.php");
$id2 = $_GET['id'];
$query = $pdo->query("SELECT * FROM leiloes where id = '" . $id2 . "' ");
   $res = $query->fetchAll(PDO::FETCH_ASSOC);
   $nome2 = $res[0]['titulo'];
   $imagem2 = $res[0]['img_src'];
   $desc2 = $res[0]['descricao'];
   

$query2 = $pdo->query("SELECT * FROM imagens where id_leilao = '" . $id2 . "' ");
$ress = $query2->fetchAll(PDO::FETCH_ASSOC);
?>

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container" style="display: flex;">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                <div class="sp-img_area">
                            <div class="sp-img_slider slick-img-slider kenne-element-carousel" data-slick-options='{
                            "slidesToShow": 1,
                            "arrows": false,
                            "fade": true,
                            "draggable": false,
                            "swipe": false,
                            "asNavFor": ".sp-img_slider-nav"
                            }'>
                            <div class="single-slide zoom">
                                    <img src="admin/uploads/leilao/img/<?= $imagem2 ?>" alt="Kenne's Product Image">
                                </div>
                            <?php
                                for ($i=0; $i < count($ress); $i++) {
                                        $id = $ress[$i]['id'];
                                        $imagem = $ress[$i]['src_imagem'];
                                    ?>
                                <div class="single-slide zoom">
                                    <img src="admin/uploads/leilao/img/<?= $imagem ?>" alt="Kenne's Product Image">
                                </div><?php } ?>
                            </div>
                            <div class="sp-img_slider-nav slick-slider-nav kenne-element-carousel arrow-style-2 arrow-style-3" data-slick-options='{
                            "slidesToShow": 3,
                            "asNavFor": ".sp-img_slider",
                            "focusOnSelect": true,
                            "arrows" : true,
                            "spaceBetween": 30
                            }' data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                ]'>
                                <div class="single-slide">
                                    <img src="img/produtos/<?= $imagem2 ?>" alt="Kenne's Product Image">
                                </div>
                                <?php
                                for ($i=0; $i < count($ress); $i++) {
                                        $id = $ress[$i]['id'];
                                        $imagem = $ress[$i]['imagens'];
                                    ?>
                                <div class="single-slide">
                                    <img src="img/produtos/<?= $imagem ?>" alt="Kenne's Product Image">
                                </div><?php } ?>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?= $nome2 ?></h3>
                        <div class="product__details__price">R$<?= $valor ?></div>
                        <p>
                        <?= $desc2 ?>
                        </p>
                          <a class="site-btn" href="shop-detalhes.php?id=<?= $id2?>&funcao=carrinho">Comprar</a>
                        <ul>
                            <li><b>Tamanho:</b> <span><?= $tamanho2 ?></span></li>
                            <li><b>Tamanho veste:</b> <span><?= $tamanhove2 ?></span></li>
                            <li><b>Compartlhe em:</b>
                                <div class="sharethis-inline-share-buttons"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  
    <!-- Modal -->
<div class="modal" id="modalCarrinho" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <?php
                   $query = $pdo->query("SELECT * FROM produtos where id = '" . @$_GET["id"]. "' ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);
                   $nome2 = $res[0]['nome'];
                   
?>
                <h5 class="modal-title">Carrinho de compras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p>Deseja adicionar <?php echo $nome2 ?> ao carrinho</p>

                <div align="center" id="mensagem_excluir" class="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-cancelar-excluir">Não</button>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?= @$_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-success">Sim</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <?php
    require_once("footer.php");
    if (@$_GET['funcao'] == 'carrinho' ){
        echo "<script>$('#modalCarrinho').modal('show');</script>";
    }
    ?>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#btn-deletar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: "carrinho/inserir_carrinho.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Cadastrado com Sucesso!') {
                        window.location = "carrinho.php";
                    }

                    $('#mensagem_excluir').text(mensagem)



                },

            })
        })
    })
</script>
