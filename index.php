<?php include('header.php');?>

<div class="banners">
    <!-- slideshow images -->
    <div class="fullbanner">  
        <div class="slideshow"> 
            <ul> 

                <?php
                $query_banners = "SELECT * FROM banners WHERE status = 1 ORDER BY ordem ASC";
                $result_banners = $pdo->query($query_banners);
                $dados2 = $result_banners->fetchAll(PDO::FETCH_ASSOC);
                $num_banners = count($dados2);

                if ($num_banners > 0) {
                    foreach ($dados2 as $banner) {?>
                        <li><a href="#"><img src="admin/uploads/banner/img/<?= $banner["img_src"] ?>" alt="<?= $banner["titulo"] ?>" /></a></li>
                        <?php 
                    }
                }
                ?>
            </ul> 
        </div> 
        <!-- change image links -->
    </div>
    <!--slideshow images -->
</div>

<div class="leiloes">
    <div class="tit-home">
        <h2>Estes são os leilões de hoje. Dê seu lance!</h2>
    </div>

    <?php
    $datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));

    
    //AND comeca_em >= '$datetime_atual'
    $query_leiloes = "SELECT *,leiloes.id AS id, DATE_FORMAT(comeca_em, '%d/%m/%Y') AS data_inicio, DATE_FORMAT(comeca_em, '%T') AS hora_inicio FROM leiloes LEFT OUTER JOIN imagens ON imagens.id_leilao = leiloes.id  WHERE leiloes.status = 1 ORDER BY comeca_em ASC ";
    $result_leiloes = $pdo->query($query_leiloes);
    $res = $result_leiloes->fetchAll(PDO::FETCH_ASSOC);
    $num_leiloes = count($res);

    $count = 1;
    if ($num_leiloes > 0) {
        foreach ($res as $leilao) {
            $lance_valor = 0;
            $lance_usuario = "---";

            $query_lances = "SELECT * FROM lances LEFT JOIN usuarios ON usuarios.id = lances.id_usuario WHERE id_leilao = " . $leilao['id'] . "";
            $result_lances = $pdo->query($query_lances);
            $dados3 = $result_lances->fetchAll(PDO::FETCH_ASSOC);
            $num_lances = count($dados3);

        
                foreach ($dados3 as $lance) {
                    $lance_usuario = $lance['login'];
                }
            
            ?>
            <div class="<?=  ($count %3 == 0) ? 'produto-ult' : 'produto'; ?>" id="leilao_<?= $leilao['id'] ?>">
                <?php if ($leilao['comeca_em'] > $datetime_atual): ?>
                    <a style="text-decoration:none;" href="<?= $leilao['slug']; ?>" title="">
                        <div style="position:relative; left: -10px;" id="targe_auction_<?= $leilao['id'] ?>">
                            <div class="product-targe" id="targe_<?= $leilao['id'] ?>">
                                Início do Cronômetro:
                                <div class="product-targe_time"><?= $leilao['data_inicio'] ?> - <?= $leilao['hora_inicio'] ?></div>
                                <span class="product-targe_weekday">(Horário de Brasília)</span>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
                <a href="<?= @$leilao['slug']; ?>" class="desc-prod">
                    <h3><?= @$leilao['titulo']; ?></h3>
                    
                    <?php if(@$leilao['frete'] || @$leilao['arremate_gratis']): ?>
                        <div style="position:relative;" id="icons_auction_<?= $leilao['id'] ?>">
                            <?php if(@$leilao['arremate_gratis']): ?>
                                <div class="product-icon icon-free" title="Valor de Arremate Grátis"></div>
                            <?php endif; ?>
                            <?php if(@$leilao['frete']): ?>
                                <div class="product-icon icon-shipping" title="Frete Grátis"></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="img-prod">
                        <img src="admin/uploads/leilao/img/<?= @$leilao['img_src']; ?>" alt="<?= $leilao['titulo']; ?>" title="<?= $leilao['titulo']; ?>" /> 
                    </div>
                </a>	

                <div class="valor-prod">
                    <span id="valor_<?= $leilao['id'] ?>">R$ <?= $leilao['valor_item'] ?></span>
                    <!--<p>95% de economia</p>-->
                </div>

                <div class="box-lance" id="box_lance_<?= $leilao['id'] ?>">
                    <div class="box-contador contador-verde" id="cont_<?= $leilao['id'] ?>"><?= $leilao['duracao'] ?></div>
                    <div class="lance-usuario">
                        <!--<a href="#">--><button type="button" class="button_submit" value="<?= $leilao['id'] ?>" style="width: 120px; height:50px; border-radius:20px; font-size:24px; background:#82C305; color:#fff;">Lance</button><!--</a>-->
                        <p id="usuario_<?= $leilao['id'] ?>" class="usuario_lance"><?= $lance_usuario; ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<div class="paginacao">
    <ul>
        <li class="bt-grande"><a href="#">Anterior</a></li>
        <li class="num"><a href="#" class="ativo">1</a></li>
        <li class="num"><a href="#">2</a></li>
        <li class="num"><a href="#">3</a></li>
        <li class="bt-grande"><a href="#">Próximo</a></li>
    </ul>
</div>

<div class="prox-leiloes">
    <div class="tit-home">
        <h2>Próximos leilões em destaque</h2>
    </div>
    
    <?php
    $query_leiloes_dest = "SELECT titulo, slug, img_src, DATE_FORMAT(comeca_em, '%d/%m') AS data_inicio, DATE_FORMAT(comeca_em, '%T') AS hora_inicio FROM leiloes WHERE status = 1 AND finalizado = 0 AND destaque = 1 ORDER BY comeca_em ASC LIMIT 0, 7";
    $result_leiloes_dest = $pdo->query($query_leiloes_dest);
    $dados4 = $result_banners->fetchAll(PDO::FETCH_ASSOC);
    $num_leiloes_dest = count($dados4);

    if ($num_leiloes_dest > 0) {
        echo '<div class="slide-prox-leiloes"><div class="conteudo-prox-leiloes"><ul id="slider1" class="multiple">';
        while ($leilao_dest = $dados4) {
            ?>
            <li>
                <p class="tit">
                    <a href="<?= $leilao_dest['slug']; ?>"><?= $leilao_dest['titulo']; ?></a>
                </p>
                <img src="admin/uploads/leilao/thumb/<?= $leilao_dest['img_src']; ?>" class="img-destslide" alt="<?= $leilao['titulo']; ?>" title="<?= $leilao['titulo']; ?>" />
                <p><?= $leilao_dest['data_inicio']; ?> - <?= $leilao_dest['hora_inicio']; ?></p> 
            </li>
            <?php
        }
        echo '</ul></div></div>';
    }
    ?>
</div>

<!-- <div class="ultimos-ganhadores">
    <div class="tit-home">
        <h2>Confira os últimos ganhadores!</h2>
    </div>

    <div class="box-item-gan">
        <div class="item-img">
            <a href="#" title="#"><img src="img/tv-32-led-sony-bravia-1.png" alt="" title="" width="140" height="100"  /></a>
        </div>
        <div class="item-desc">
            <h3> Câmera Digital 14 MP com 18x Zoom Óptico, Filma em HD e LCD 3'' - Fuji </h3>
            <p>
                Possui zoom potente, excelente qualidade de imagem para imagens de vídeo HD e ainda por meio de diversas 
                funções de suporte com as renomadas lentes Fujinon.
            </p>
        </div>
        <div class="item-valor-data">
            <div class="item-merc">
                <p class="vd-tit">Valor de mercado:</p>
                <span>R$ 568,89</span>
            </div>
            <div class="item-arre">
                <p class="vd-tit">Vendido por:</p>
                <span>R$ 31,23</span>
            </div>
        </div>
        <div class="item-usuario">
            <p class="vd-tit">Arrematado por:</p>
            <span>Éder</span>
        </div>			
        <div class="item-valor-data">
            <div class="item-merc">
                <p class="vd-tit">Iniciado em:</p>
                <span>01/01/2012 - 15:00</span>
            </div>
            <div class="item-arre">
                <p class="vd-tit">Arrematado em:</p>
                <span>14/01/2012 - 13:00</span>
            </div>
        </div>
    </div>
    <div class="box-item-gan">
        <div class="item-img">
            <a href="#" title="#"><img src="img/faqueiro-aco-classic-home-1.png" alt="" title="" width="140" height="100"  /></a>
        </div>
        <div class="item-desc">
            <h3> Câmera Digital 14 MP com 18x Zoom Óptico, Filma em HD e LCD 3'' - Fuji </h3>
            <p>
                Possui zoom potente, excelente qualidade de imagem para imagens de vídeo HD e ainda por meio de diversas 
                funções de suporte com as renomadas lentes Fujinon.
            </p>
        </div>
        <div class="item-valor-data">
            <div class="item-merc">
                <p class="vd-tit">Valor de mercado:</p>
                <span>R$ 568,89</span>
            </div>
            <div class="item-arre">
                <p class="vd-tit">Vendido por:</p>
                <span>R$ 31,23</span>
            </div>
        </div>
        <div class="item-usuario">
            <p class="vd-tit">Arrematado por:</p>
            <span>Éder</span>
        </div>
        <div class="item-valor-data">
            <div class="item-merc">
                <p class="vd-tit">Iniciado em:</p>
                <span>01/01/2012 - 15:00</span>
            </div>
            <div class="item-arre">
                <p class="vd-tit">Arrematado em:</p>
                <span>14/01/2012 - 13:00</span>
            </div>
        </div>
    </div>
    <div class="box-item-gan">
        <div class="item-img">
            <a href="#" title="#"><img src="img/tv-32-led-sony-bravia-1.png" alt="" title="" width="140" height="100"  /></a>
        </div>
        <div class="item-desc">
            <h3> Câmera Digital 14 MP com 18x Zoom Óptico, Filma em HD e LCD 3' - Fuji </h3>
            <p>
                Possui zoom potente, excelente qualidade de imagem para imagens de vídeo HD e ainda por meio de diversas 
                funções de suporte com as renomadas lentes Fujinon.
            </p>
        </div>
        <div class="item-valor-data">
            <div class="item-merc">
                <p class="vd-tit">Valor de mercado:</p>
                <span>R$ 568,89</span>
            </div>
            <div class="item-arre">
                <p class="vd-tit">Vendido por:</p>
                <span>R$ 31,23</span>
            </div>
        </div>
        <div class="item-usuario">
            <p class="vd-tit">Arrematado por:</p>
            <span>Éder</span>
        </div>			
        <div class="item-valor-data">
            <div class="item-merc">
                <p class="vd-tit">Iniciado em:</p>
                <span>01/01/2012 - 15:00</span>
            </div>
            <div class="item-arre">
                <p class="vd-tit">Arrematado em:</p>
                <span>14/01/2012 - 13:00</span>
            </div>
        </div>
    </div>
</div>
<div class="paginacao">
    <ul>
        <li class="bt-grande"><a href="#">Anterior</a></li>
        <li class="num"><a href="#" class="ativo">1</a></li>
        <li class="num"><a href="#">2</a></li>
        <li class="num"><a href="#">3</a></li>
        <li class="bt-grande"><a href="#">Próximo</a></li>
    </ul>
</div> -->
<?php include('footer.php'); ?>