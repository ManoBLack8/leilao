<?php
session_start();
include_once('admin/includes/conexao.php');
$notificationcode = preg_replace('/[^[:alnum:]-]/','',$_REQUEST["code"]);

$data['token'] = '4dfe6e4d-cdd6-4c91-923a-2e925a6554a134c7b07e4828a8c7f46cfb30c5f5fb483840-7674-4b23-9d4b-50ef84c524d7';
$data['email'] = 'ederaddj@gmail.com';

$data = http_build_query($data);

$url = 'https://ws.pagseguro.uol.com.br/v3/transactions/'.$notificationcode.'?'.$data;

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);
$xml = simplexml_load_string($xml);
$status = $xml->status;
$refe = $xml->reference;
$data_envio = $xml->date;
$code = $xml->code;
$id_pacote = $xml->items->item->id;
$id_promotor = $_SESSION['id_promotor'];
if (!$xml->error) {
    $id_usuarios = $_SESSION["id_usuario"];

    $queryy = "SELECT * FROM compras WHERE transacao = '$code'";
    $num_compras = $pdo->query($queryy);
    $num_compras = $num_compras->fetchAll(PDO::FETCH_ASSOC);
    if (count($num_compras) == 0) {
        $query = "INSERT INTO compras VALUES (NULL, '$id_usuarios', '$id_pacote', '$code', '$data_envio', '$refe', '$id_promotor', '$status')";
        $query = $pdo->query($query);
    
        if ($refe == "leilao") {
            $queryy = "SELECT num_lances FROM pacotes WHERE id = '$id_pacote'";
            $num_pacote = $pdo->query($queryy);
            $num_pacote = $num_pacote->fetchAll(PDO::FETCH_ASSOC);
            $num_pacotee = $num_pacote[0];
            $lances_do_pacote = $num_pacotee["num_lances"];

            $query = "SELECT num_lances FROM usuarios WHERE id = ". $id_usuarios ."";
            $num_lances = $pdo->query($query);
            $num_lances = $num_lances->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($num_lances as $nlances) {
                $perdeu_lance = $nlances['num_lances'] + $lances_do_pacote;
                $query = "UPDATE usuarios SET num_lances = $perdeu_lance WHERE id = $id_usuarios";
                $result = $pdo->query($query);
                $_SESSION['num_lances_usuario'] = $perdeu_lance;
        
            }
        }
    }
}
header('location: index.php');