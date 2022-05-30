<?php
$datetime_atual = mktime(gmdate("H") - 3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
echo $datetime_atual;