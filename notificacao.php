<?php
session_start();
include_once('admin/includes/conexao.php');
$notificationcode = preg_replace('/[^[:alnum:]-]/','','7BA5D450-2889-4BBA-918F-57200F7988FF');

$data['token'] = '0fe1b16d-3434-46a9-ae56-e971c7c7dc38418cd3d64d5d8fee9d4e689fb5eda525e548-6b70-4348-8073-32f468117970';
$data['email'] = 'viniciusfe66@gmail.com';

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
if (!$xml->error) {
    $id_usuarios = $_SESSION["id_usuario"];

    $queryy = "SELECT * FROM compras WHERE transacao = '$code'";
    $num_compras = $pdo->query($queryy);
    $num_compras = $num_compras->fetchAll(PDO::FETCH_ASSOC);
    if (count($num_compras) == 0) {
        $query = "INSERT INTO compras VALUES (NULL, '$id_usuarios', '$id_pacote', '$code', '$data_envio', '$refe', '$status')";
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