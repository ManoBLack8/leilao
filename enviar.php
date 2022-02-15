<?php
if ($_POST['nomecontato'] === "") {
    echo 'Preencha o campo Nome';
    exit();
    
}
if ($_POST['emailcontato'] === "") {
    echo 'Preencha o campo Email';
    exit();
    
}
if ($_POST['msgcontato'] === "") {
    echo 'Preencha o campo Mensagem';
    exit();
    
}

$destinatario = 'ederaddj@gmail.com';
$assunto = 'Leilão Duarte';

$mensagem = utf8_decode('Nome: '.$_POST['nomecontato']. "\r\n"."\r\n". 'Mensagem: '.$_POST['msgcontato']);

$cabecalhos ="From: ".$_POST['emailcontato'];

@mail($destinatario, $assunto, $mensagem, $cabecalhos);

echo 'Enviado com Sucesso!';

?>