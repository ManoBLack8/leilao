<?php
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dataLocal = date('Y-m-d H:i:s', time());
    $originaldata = strtotime($dataLocal);
    echo $originaldata;