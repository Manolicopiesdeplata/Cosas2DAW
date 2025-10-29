<?php
    define("PI", M_PI);
    session_start();
    if (isset($_SESSION['pizzas'])) {
        $_SESSION['pizzas'] = [];
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $diametro = floatval($_POST['diametro']);
        $precio = floatval($_POST['precio']);

        if ($diametro <= 0 || $precio <= 0) {
            echo "<p>ERROR, PRECIO O DIAMETRO NO VALIDOS</p>";
        } else {
            $radio = $diametro / 2;
            $area = PI * $radio**2;
            $relacion = $area / $precio;

            $_SESSION['pizzas'][] = [
                "diametro" => $diametro,
                "precio" => $precio,
                "area" => $area,
                "relacion" => $relacion
            ];
        }
    }
     if (!empty($_SESSION['pizzas'])) {
        echo "<h2>Resultados</h2>";
        echo "<table border=1px>";
        echo "<tr><th>#</th><th>Diámetro (cm)</th><th>Precio (€)</th><th>Área (cm²)</th><th>cm² por €</th></tr>";
    
        $i = 1;
        foreach ($_SESSION['pizzas'] as $pizza) {
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>" . number_format($pizza['diametro'], 1) . "</td>";
            echo "<td>" . number_format($pizza['precio'], 2) . "</td>";
            echo "<td>" . number_format($pizza['area'], 2) . "</td>";
            echo "<td>" . number_format($pizza['relacion'], 2) . "</td>";
            echo "</tr>";
            $i++;
        }
        echo "</table>";
    }
    ?>