<?php include('header.php'); ?>

<?php
$slug = @$_GET['slug'];

$sql_leiloes = "SELECT * FROM leiloes WHERE slug = '" . $slug . "' AND status = 1";
$result_leilao = $pdo->query($sql_leiloes);
$result_leilao = $result_leilao->fetchAll(PDO::FETCH_ASSOC);
$num_leilao = count($result_leilao);

$sql_paginas = "SELECT * FROM paginas WHERE slug = '" . $slug . "' AND status = 1";
$result_pagina = $pdo->query($sql_paginas);
$result_pagina = $result_pagina->fetchAll(PDO::FETCH_ASSOC);
$num_pagina = count($result_pagina);




$sql_noticias = "SELECT * FROM noticias WHERE slug = '" . $slug . "' AND status = 1";
$result_noticia = $pdo->query($sql_noticias);
$result_noticia = $result_noticia->fetchAll(PDO::FETCH_ASSOC);
$num_noticia = count($result_noticia);

if ($num_leilao):
    $leilao = $result_leilao;

    $lance_valor = 0;
    $lance_usuario = "---";

    $query_lances = "SELECT l.valor_lance, u.login FROM lances l, usuarios u WHERE l.id_leilao = " . $leilao['id'] . " ORDER BY l.id DESC LIMIT 0, 1";
    $result_lances = $pdo->query($query_lances);
    $result_lances = $result_lances->fetchAll(PDO::FETCH_ASSOC);
    $num_lances = count($result_lances);

    if ($num_lances > 0) {
        $lance = $result_lances;

        $lance_valor = $lance['valor_lance'];
        $lance_usuario = $lance['login'];
    }
    ?>
    <div class="conteudo">
        <div class="tit-conteudo">
            <h2>Detalhes do leilão</h2>
        </div>

        <div class="protudo-detalhes">

            <div class="produto top-0">
                <a href="#" class="desc-prod">
                    <h3><?php echo $leilao['titulo'] ?></h3>
                    
                    <?php if($leilao['frete_gratis'] || $leilao['arremate_gratis']): ?>
                        <div style="position:relative;" id="icons_auction_<?php echo $leilao['id'] ?>">
                            <?php if($leilao['arremate_gratis']): ?>
                                <div class="product-icon icon-free" title="Valor de Arremate Grátis"></div>
                            <?php endif; ?>
                            <?php if($leilao['frete_gratis']): ?>
                                <div class="product-icon icon-shipping" title="Frete Grátis"></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="img-prod">
                        <img src="admin/uploads/leilao/img/<?php echo $leilao['img_src']; ?>" alt="<?php echo $leilao['titulo']; ?>" title="<?php echo $leilao['titulo']; ?>" />
                    </div>
                </a>	

                <div class="valor-prod">
                    <span id="valor_<?php echo $leilao['id'] ?>" >R$ <?php echo number_format($lance_valor, 2, ',', '.'); ?></span>
                    <!--<p>95% de economia</p>-->
                </div>
                <div class="box-lance" id="box_lance_<?php echo $leilao['id'] ?>" >
                    <div class="box-contador contador-verde" id="cont_<?php echo $leilao['id'] ?>"><?php echo $leilao['duracao']; ?></div>

                    <div class="lance-usuario">
                        <button type="button" class="button_submit" value="<?php echo $leilao['id'] ?>"><img src="img/bt-lance.png" title="Lance" alt="Lance" /></button>
                        <p id="usuario_<?php echo $leilao['id'] ?>" ><?php echo $lance_usuario; ?></p>
                    </div>
                </div>

            </div>

            <div class="detalhes-gerais">
                <div class="box-detalhes-produto">
                    <div class="prodinfo">
                        <p>Início do cronômetro</p>
                        <p class="data-leilao">sexta-feira, 09 de Março de 2012 - 11:00</p>
                    </div>

                    <div class="box-valores">Preço de mercado:<div class="prod_info_preco">R$ <?php echo $leilao['valor_item']; ?></div></div>
                    <div class="box-valores" >Preço de arremate:<div class="prod_info_preco" id="valor_arremate_<?php echo $leilao['id'] ?>" >R$ 0,00</div></div>

                    <div class="porc-produto" id="porc_produto_<?php echo $leilao['id'] ?>">
                        <p class="porcentagem" id="porcentagem_<?php echo $leilao['id'] ?>"> 100% </p>
                        <p> mais barato que o preço em loja </p>
                    </div>
                </div>

                <div class="box-ultimos-lances">
                    <p>Últimos lances:</p>

                    <table>
                        <tr>
                            <td> ramonoliver </td>
                            <td class="valor-tabela"> R$ 0,54 </td>
                        </tr>
                        <tr>
                            <td> romulonobre </td>
                            <td class="valor-tabela"> R$ 0,58 </td>
                        </tr>
                        <tr>
                            <td> ramonoliver </td>
                            <td class="valor-tabela"> R$ 0,54 </td>
                        </tr>
                        <tr>
                            <td> romulonobre </td>
                            <td class="valor-tabela"> R$ 0,58 </td>
                        </tr>
                        <tr>
                            <td> ramonoliver </td>
                            <td class="valor-tabela"> R$ 0,54 </td>
                        </tr>
                        <tr>
                            <td> romulonobre </td>
                            <td class="valor-tabela"> R$ 0,58 </td>
                        </tr>
                        <tr>
                            <td> ramonoliver </td>
                            <td class="valor-tabela"> R$ 0,54 </td>
                        </tr>
                        <tr>
                            <td> romulonobre </td>
                            <td class="valor-tabela"> R$ 0,58 </td>
                        </tr>
                        <tr>
                            <td> ramonoliver </td>
                            <td class="valor-tabela"> R$ 0,54 </td>
                        </tr>
                        <tr>
                            <td> romulonobre </td>
                            <td class="valor-tabela"> R$ 0,58 </td>
                        </tr>
                        <tr>
                            <td> ramonoliver </td>
                            <td class="valor-tabela"> R$ 0,54 </td>
                        </tr>
                        <tr>
                            <td> romulonobre </td>
                            <td class="valor-tabela"> R$ 0,58 </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="box-img-produto">
                <ul>
                    <?php
                    $sql_imgs = "SELECT img_src FROM imagens WHERE id_leilao = " . $leilao['id'] . " LIMIT 0, 4";
                    $result_imgs = $pdo->query($sql_imgs);
                    $result_imgs = $result_imgs->fetchAll(PDO::FETCH_ASSOC);
                    $num_imgs = count($result_imgs);
                    
                    if($num_imgs > 0){
                        while($imagem = $result_imgs){
                            echo '<li><a href="#"><img src="admin/uploads/leilao/thumb/'. $imagem['img_src'] .'" /></a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="leiloes-interna">
            <div class="leilao-int-item">
                <div class="nome-produto-p">
                    <p> Ipod Nano 8gb - Apple </p>
                    <p class="valor"> R$ 3,18 </p>
                </div>
                <div class="infos-produto-p">
                    <div class="img-produto-p">
                        <img src="img/ipodnano.png" title="Ipod Nano" />
                    </div>

                    <div class="infos-conteudo-p">
                        <div class="contador-verde-p">18</div>

                        <div class="lance-usuario-p">
                            <a href="#"><img src="img/bt-lance-p.png" title="Lance" alt="Lance"/></a>
                            <p>ramonoliver</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="leilao-int-item">
                <div class="nome-produto-p">
                    <p> Ipod Nano 8gb - Apple </p>
                    <p class="valor"> R$ 3,18 </p>
                </div>
                <div class="infos-produto-p">
                    <div class="img-produto-p">
                        <img src="img/ipodnano.png" title="Ipod Nano" />
                    </div>

                    <div class="infos-conteudo-p">
                        <div class="contador-verde-p">18</div>

                        <div class="lance-usuario-p">
                            <a href="#"><img src="img/bt-lance-p.png" title="Lance" alt="Lance"></a>
                            <p>ramonoliver</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="leilao-int-item-ult">
                <div class="nome-produto-p">
                    <p> Ipod Nano 8gb - Apple </p>
                    <p class="valor"> R$ 3,18 </p>
                </div>
                <div class="infos-produto-p">
                    <div class="img-produto-p">
                        <img src="img/ipodnano.png" title="Ipod Nano" />
                    </div>

                    <div class="infos-conteudo-p">
                        <div class="contador-verde-p">18</div>

                        <div class="lance-usuario-p">
                            <a href="#"><img src="img/bt-lance-p.png" title="Lance" alt="Lance"></a>
                            <p>ramonoliver</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php elseif ($num_pagina):
    $pagina = $result_pagina;
    ?>
    <div class="conteudo">
        <div class="tit-conteudo">
            <h2><?php echo utf8_encode($pagina['titulo']); ?></h2>
        </div>
        <div style="clear:both;"></div>
        <div id ="container-content"><?php echo utf8_encode($pagina['conteudo']); ?></div>

        <div class="prox-leiloes">
            <div class="tit-home">
                <h2>Próximos leilões em destaque</h2>
            </div>

            <div class="slide-prox-leiloes">

                <div class="conteudo-prox-leiloes">
                    <ul id="slider1" class="multiple">
                        <li>
                            <p class="tit">
                                <a href="#">Smartphone Galaxy S II, Dua...</a>
                            </p>
                            <img alt="Smartphone Galaxy S II, Dual Core, Super AMOLED 4,0, Android 2.3 - SAMSUNG" class="img-destslide" src="http://s3.amazonaws.com/arremateclub.com.br/files/108/medium/7493672GG.png?1314463921" />
                            <p>08/02 - 16:00</p> 
                        </li>
                        <li>
                            <p class="tit">
                                <a href="#">Smartphone Galaxy S II, Dua...</a>
                            </p>
                            <img alt="Smartphone Galaxy S II, Dual Core, Super AMOLED 4,0, Android 2.3 - SAMSUNG" class="img-destslide" src="http://s3.amazonaws.com/arremateclub.com.br/files/108/medium/7493672GG.png?1314463921" />
                            <p>08/02 - 16:00</p> 
                        </li>
                        <li>
                            <p class="tit">
                                <a href="#">Smartphone Galaxy S II, Dua...</a>
                            </p>
                            <img alt="Smartphone Galaxy S II, Dual Core, Super AMOLED 4,0, Android 2.3 - SAMSUNG" class="img-destslide" src="http://s3.amazonaws.com/arremateclub.com.br/files/108/medium/7493672GG.png?1314463921" />
                            <p>08/02 - 16:00</p> 
                        </li>
                        <li>
                            <p class="tit">
                                <a href="#">Smartphone Galaxy S II, Dua...</a>
                            </p>
                            <img alt="Smartphone Galaxy S II, Dual Core, Super AMOLED 4,0, Android 2.3 - SAMSUNG" class="img-destslide" src="http://s3.amazonaws.com/arremateclub.com.br/files/108/medium/7493672GG.png?1314463921" />
                            <p>08/02 - 16:00</p> 
                        </li>
                        <li>
                            <p class="tit">
                                <a href="#">Smartphone Galaxy S II, Dua...</a>
                            </p>
                            <img alt="Smartphone Galaxy S II, Dual Core, Super AMOLED 4,0, Android 2.3 - SAMSUNG" class="img-destslide" src="http://s3.amazonaws.com/arremateclub.com.br/files/108/medium/7493672GG.png?1314463921" />
                            <p>08/02 - 16:00</p> 
                        </li>
                        <li>
                            <p class="tit">
                                <a href="#">Smartphone Galaxy S II, Dua...</a>
                            </p>
                            <img alt="Smartphone Galaxy S II, Dual Core, Super AMOLED 4,0, Android 2.3 - SAMSUNG" class="img-destslide" src="http://s3.amazonaws.com/arremateclub.com.br/files/108/medium/7493672GG.png?1314463921" />
                            <p>08/02 - 16:00</p> 
                        </li>
                        <li>
                            <p class="tit">
                                <a href="#">Smartphone Galaxy S II, Dua...</a>
                            </p>
                            <img alt="Smartphone Galaxy S II, Dual Core, Super AMOLED 4,0, Android 2.3 - SAMSUNG" class="img-destslide" src="http://s3.amazonaws.com/arremateclub.com.br/files/108/medium/7493672GG.png?1314463921" />
                            <p>08/02 - 16:00</p> 
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <?php
elseif ($num_noticia):
    $noticia = $result_noticia;
    ?>

    <?php
endif;

include_once 'footer.php';
?>