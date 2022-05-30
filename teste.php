<?php 
    $date = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), (gmdate("s")), gmdate("m"), gmdate("d"), gmdate("Y")));
    $dates = date("Y-m-d H:i:s", mktime(gmdate("H") - 3, gmdate("i"), (gmdate("s") + 15), gmdate("m"), gmdate("d"), gmdate("Y")));

var_dump($date);
var_dump($dates);