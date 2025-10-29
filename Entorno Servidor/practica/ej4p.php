<?php
    $grado = floatval($_POST["grado"]);
    switch ($_POST["grados"]) {
        case ("cf"):
            echo "<p>" . ($grado * 9 / 5) + 32 . "Fº</p>";
            break;
        case ("ck"):
            echo "<p>" . $grado + 273.15 . "Kº</p>";
            break;
        case ("fc"):
            echo "<p>" . ($grado - 32) * 5 / 9 . "Cº</p>";
            break;
        case ("fk"):
            echo "<p>" . ($grado - 32) * 5 / 9 + 273.15. "Kº</p>";
            break;
        case ("kc"):
            echo "<p>". $grado - 273.15 . "Cº</p>";
            break;
        case ("kf"):
            echo "<p>". ($grado - 273.15) * 9 / 5 + 32 . "Fº</p>";
    }
    ?>