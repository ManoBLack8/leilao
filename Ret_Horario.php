<?php
    $datetime_atual = mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
    $timecliente = $_GET['TimeCliente'];
    $tcliente = explode("/", $timecliente);
    $microcliente =  mktime($tcliente[3], $tcliente[4], $tcliente[5], $tcliente[1], $tcliente[0], $tcliente[2]);
    echo $datetime_atual-$microcliente;