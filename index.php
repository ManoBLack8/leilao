<?php include('header.php');?>
<style>
    ExtSubInf1 {
  text-align: center;
  margin-bottom: 20px;
}
.ExtSubInf1 div {
	display: inline-block;
	border: 0;
	background: #e6e6e6;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	font-family: roboto-medium;
	text-transform: uppercase;
	font-size: 35px;
	font-weight: 400;
	color: #172e57;
	width: 50px;
	height: 50px;
	line-height: 50px;
	text-align: center;
	vertical-align: middle;
	margin: 0;
	padding: 0;
	margin-right: 6px;
}
.text-conteiner{
    display !important:flex
    justify-content: center;
    align-items: center;
    text-align:center;
    border:1px solid #c1c1c1;
    border-radius: 10px;
    margin: 5px;
    width: 250px;
}
.text-content{
    font-family: Arial, serif;
    font-size:15px;
}
</style>
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

<div class="leiloes row">
    <div class="tit-home">
        <h2>Estes são os leilões de hoje. Dê seu lance!</h2>
    </div>

    <?php
    $datetime_atual = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));

    
    //AND comeca_em >= '$datetime_atual'
    $query_leiloes = "SELECT *,leiloes.id AS id, DATE_FORMAT(comeca_em, '%d/%m/%Y') AS data_inicio, DATE_FORMAT(comeca_em, '%T') AS hora_inicio FROM leiloes LEFT OUTER JOIN imagens ON imagens.id_leilao = leiloes.id WHERE leiloes.status > 0  ORDER BY leiloes.id ASC ";
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
            <div class="text-conteiner">
                <p class="text-content">Ínicio dia <?= $leilao['inicio_em'] ?></p>
            </div>
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
                    <span id="L_UltimoValor_<?= $leilao['id'] ?>">R$ <?= $leilao['valor_item'] ?></span>
                    <!--<p>95% de economia</p>-->
                </div>
                <input class="LeilaoOnline" type="hidden" value="<?= $leilao['id'] ?>">
                <input id="LeilaoOnline_Info_<?= $leilao['id'] ?>" type="hidden" value="">
                <input id="LeilaoOnline_Config_<?= $leilao['id'] ?>" type="hidden" value="N">

                <div class="box-lance" id="box_lance_<?= $leilao['id'] ?>">
                <div class="ExtSubInf1">
                    <div id="L_ContDown_1_<?= $leilao['id'] ?>">-</div>
                    <div id="L_ContDown_2_<?= $leilao['id'] ?>">-</div>
		        </div>
                <div class="ExtSubInf2" id="L_UltimoLogin_<?= $leilao['id'] ?>">

                </div>
                
                <div class="ExtSuBtn" id="L_Botao_Box_<?= $leilao['id'] ?>">
			        <div id="L_BotaoA_<?= $leilao['id'] ?>">
                    	<a href="javascript:;" onclick="ExecutarLance('<?= $leilao['id'] ?>');" title="ExecutarLance" class="btn btn-custom3">LANCE</a>
                    </div>
                    <div id="L_BotaoB_<?= $leilao['id'] ?>" class="hidde" style="display: none;">
                        <a href="javascript:;" title="Lance sendo Executado" class="btn btn-custom3"><i class="fa fa-spinner fa-spin"></i></a>
                    </div>
                </div>
                <div class="ExtSuBtn ExtSuBtnF" style="display: none; height:44px" id="L_Botao_BoxF_<?= $leilao['id'] ?>">Arrematado!</div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
</div>

<div class="prox-leiloes">
    <div class="tit-home">
        <h2>Próximos leilões em destaque</h2>
    </div>
    
    <?php
    $query_leiloes_dest = "SELECT titulo, slug, img_src, DATE_FORMAT(comeca_em, '%d/%m') AS data_inicio, DATE_FORMAT(comeca_em, '%T') AS hora_inicio FROM leiloes WHERE finalizado = 0 AND destaque = 1 ORDER BY comeca_em ASC LIMIT 0, 7";
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