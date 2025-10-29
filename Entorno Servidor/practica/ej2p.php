<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];
            $altura = $_POST["altura"];
            $estudiante = $_POST["bool"];

            echo "<p>nombre: ";
            var_dump($nombre) . "</p>";
            echo "<p> edad: ";
            var_dump((int)$edad);
            echo " años</p>";
            echo "<p> altura: ";
            var_dump((float)$altura);
            echo " cm</p>";
            if ($estudiante == "s") {
                echo "<p>estudiante: si</p>";
            }else{
                echo "<p>estudiante: no</p>";
            }
        }
    ?>