<?php $menuativo = basename($_SERVER['SCRIPT_NAME']); ?>

<!-- Left navigation -->
<div class="leftNav">
    <ul id="menu">
        <li><a href="./" title="Início" <?php echo ($menuativo == "index.php") ? 'class="active"' : '' ?> ><span>Home</span></a></li>
        <li><a href="#" title="Gerenciar Leilões" <?php echo ($menuativo == "pacote.php" || $menuativo == "categoria.php" || $menuativo == "leilao.php" ) ? 'class="active exp"' : 'class="exp"' ?> ><span>Leilões</span></a>
            <ul class="sub">
                <li><a href="pacote.php">Pacotes de Lances</a></li>
                <li><a href="categoria.php">Categorias dos Leilões</a></li>
                <li class="last"><a href="leilao.php">Leilões</a></li>
            </ul>
        </li>
        <li><a href="#" title="Gerenciar Usuários" <?php echo ($menuativo == "administrador.php" || $menuativo == "usuario.php" || $menuativo == "newsletter.php" || $menuativo == "depoimento.php" ) ? 'class="active exp"' : 'class="exp"' ?> ><span>Usuários</span></a>
            <ul class="sub">
                <li><a href="administrador.php">Administradores</a></li>
                <li><a href="usuario.php">Usuários</a></li>
                <li><a href="promotores.php">Promotores</a></li>
                <li class="last"><a href="depoimento.php">Depoimentos</a></li>
                <!--<li><a href="ips">Endereços IP</a></li>-->
            </ul>
        </li>
        <li><a href="#" title="Gerenciar Conteúdos" <?php echo ($menuativo == "pagina.php" || $menuativo == "banner.php" || $menuativo == "noticia.php" || $menuativo == "menu.php" ) ? 'class="active exp"' : 'class="exp"' ?> ><span>Conteúdo</span></a>
            <ul class="sub">
                <li><a href="pagina.php">Páginas</a></li>
                <!--<li><a href="noticia.php">Notícias</a></li>-->
                <li><a href="banner.php">Banners</a></li>
                <li><a href="parceiros.php">Parceiros</a></li>
                <li class="last"><a href="menu">Menu</a></li>
            </ul>
        </li>
        <li><a href="#" title="" class="exp"><span>Relatórios</span></a>
            <ul class="sub">
                <!--<li class="last"><a href="relatorio">Relatórios</a></li>-->
                <li class="last"><a href="vendas.php">Vendas</a></li>

            </ul>
        </li>
    </ul>
</div>