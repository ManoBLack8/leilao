<?php
$servidor = 'localhost';

$usuario = 'root';

$senha = '';

$banco = 'leilao';

date_default_timezone_set('America/Cuiaba');

try{
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario","$senha");
} catch (Exception $e){
    echo "erro ao conectar com banco de dados" .  $e;
}
@$funcao = $_REQUEST["acao"];
/* usei REQUEST porque dependendo do que você for fazer você pode querer enviar via get o nome da função dai ela sera pega do mesmo jeito, porque REQUEST recebe dados via GET, POST, e COOKIE */

if (function_exists($funcao)) {
    //call_user_func Chama uma função de usuário dada pelo primeiro parâmetro
    call_user_func($funcao);
}
global $pdo;
?>

