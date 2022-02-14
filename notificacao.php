<?php
$notificationcode = 'FBE6C7C8-F92D-44B8-8134-3127AC53029C';

$data['token'] = '0fe1b16d-3434-46a9-ae56-e971c7c7dc38418cd3d64d5d8fee9d4e689fb5eda525e548-6b70-4348-8073-32f468117970';
$data['email'] = 'viniciusfe66@gmail.com';

$data = http_build_query($data);

$url = 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationcode.'?'.$data;

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

var_dump($xml);