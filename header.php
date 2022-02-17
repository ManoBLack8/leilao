<?php
session_start();

include_once('admin/configs/config.php');
include_once('admin/includes/conexao.php');
$hr = date("H:i", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$dia = date("d", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$mes = date("n", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$ano = date("Y", mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));

$_SESSION['pagina_anterior'] = basename($_SERVER['SCRIPT_NAME']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Leilão Duarte</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/geral.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/blinds.css" type="text/css" media="screen" />
        
    </head>

    <body>
        <div class="boxgeral">
            <div class="geral">
                <div class="topo">
                    <a href="./" class="logo-sovinos" title="Leilão Duarte - Voltar ao início">
                        <img src="img/logo.png" alt="" style="width: 100%;">
                    </a>

                    <div class="box-login-data">
                        
                        <?php if(!isset($_SESSION["id_usuario"])): ?>
                        <div class="box-login">
                            <div style="width: 410px;float: left;">
                                <p>Olá! Você possui conta no site? Então faça seu login abaixo:</p>
                                <form action="logar.php" method="post">
                                    <input type="hidden" name="acao" value="efetuar_login" />
                                    
                                    <input type="text" name="login" value="Login" class="inputLogin" title="Login" onclick="this.value=''" onfocus="this.value=''" onblur="if(value==''){this.value='Login'}" />
                                    <input type="password" name="password" value="Senha" class="inputSenha" title="Senha" onclick="this.value=''" onfocus="this.value=''" onblur="if(value==''){this.value='Senha'}" />
                                    <button type="submit" class="bt-ok">OK</button>
                                </form>
                                <p><a href="#">Esqueci a senha</a></p>
                            </div>
                            <div class="banner-login">
                                <a href="cadastrar.php">
                                    <img src="img/banner-cadastro-topo.png" alt="Cadastre-se e ganhe 5 lances" title="Cadastre-se e ganhe 5 lances" />
                                </a>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="box-logado">
                            <div class="infosUsuario">
                                <span><?php echo @$_SESSION['login_usuario']; ?></span>
                                <div class="btsUsuario">
                                    <a href="deslogar.php" class="btSair">Sair</a>
                                    <a href="#">Comprar lances</a>
                                </div>
                            </div>
                            <div class="lancesUsuario">
                                <span><?php echo @$_SESSION['num_lances_usuario']; ?> lances</span>
                                <p>0 pontos</p>
                            </div>
                        </div>
                        <?php endif;?>
                        <div class="box-data">
                            <p>Não perca a hora do seu leilão! Agora são <span id="time"><?php echo $hr ?></span> do dia <span id="data"><?php echo $dia ?> de <?php echo $config['meses'][$mes - 1] ?> de <?php echo $ano ?></span></p>
                        </div>

                    </div>
                </div>

                <div class="menu" style="display: flex; justify-content: center;">
                    <ul style="align-items: center;">
                        <li class="bt-home"><a href="./">Home</a></li>
                        <li class="bt-cadastro"><a href="cadastrar.php">Cadastro</a></li>
                        <li class="bt-depoimentos"><a href="#">Depoimentos</a></li>
                        <li class="bt-ajuda"><a href="comprar.php">Comprar Lances</a></li>
                        <li class="bt-contato"><a href="contato.php">Contato</a></li>
                    </ul>
                </div>