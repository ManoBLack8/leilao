<?php
//habilitando o GZip
ob_start("ob_gzhandler");

//criação da sessão
session_start();

//validação para acessar a página somente se logado
if (!isset($_SESSION["id_admin"])) {
    $_SESSION['msg_error'] = "Para ter acesso a área administrativa efetue login como administrador.";

    header("Location: login");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sovinos | Painel Administrativo</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />
</head>

<body>

<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="welcome"><a href="#" title=""><img src="images/userPic.png" alt="" /></a><span>Olá, <?php echo $_SESSION["login_admin"]; ?>!</span></div>
            <div class="userNav">
                <ul>
                    <li><a href="#" title=""><img src="images/icons/topnav/profile.png" alt="" /><span>Perfil</span></a></li>
                    <li><a href="#" title=""><img src="images/icons/topnav/tasks.png" alt="" /><span>Tarefas</span></a></li>
                    <li class="dd"><img src="images/icons/topnav/messages.png" alt="" /><span>Mensagens</span><span class="numberTop">8</span>
                        <ul class="menu_body">
                            <li><a href="#" title="">new message</a></li>
                            <li><a href="#" title="">inbox</a></li>
                            <li><a href="#" title="">outbox</a></li>
                            <li><a href="#" title="">trash</a></li>
                        </ul>
                    </li>
                    <li><a href="configuracoes" title="Configurações Gerais"><img src="images/icons/topnav/settings.png" alt="" /><span>Configurações</span></a></li>
                    <li><a href="deslogar" title="Sair da Área Administrativa"><img src="images/icons/topnav/logout.png" alt="" /><span>Sair</span></a></li>
                </ul>
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>

<!-- Header -->
<div id="header" class="wrapper">
    <div class="logo"><a href="/" title=""><img src="images/loginLogo.png" alt="" /></a></div>
    <div class="middleNav">
    	<ul>
        	<li class="iMes"><a href="#" title=""><span>Support tickets</span></a><span class="numberMiddle">9</span></li>
            <li class="iStat"><a href="#" title=""><span>Statistics</span></a></li>
            <li class="iUser"><a href="usuarios" title=""><span>Usuários</span></a></li>
            <li class="iOrders"><a href="#" title=""><span>Billing panel</span></a></li>
        </ul>
    </div>
    <div class="fix"></div>
</div>
