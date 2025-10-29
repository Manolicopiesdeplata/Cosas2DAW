<?php
    $cumple = mktime(0,0,0, 5, 29, 2026);
    $actual = mktime(0,0,0, date("m"), date("d"), date("Y"));
    $diaCumple = $cumple / 60 / 60 / 24;
    $diaActual = $actual / 60 / 60 / 24;
    $getea = mktime(0,0,0, 9, 17, 2013);
    $diaGetea = $getea / 60 / 60 / 24;
    echo "Han pasado " . $diaActual - $diaGetea . " dias desde la salida de gta 5<br>";
    echo "Quedan " . $diaCumple - $diaActual . " dias para mi cumple";
?>