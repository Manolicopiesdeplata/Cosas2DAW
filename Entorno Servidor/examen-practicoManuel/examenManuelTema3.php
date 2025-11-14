<!doctype html>

<head>
    <title>Examen Práctico PHP - UT03</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }

        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }

        h2 {
            color: #34495e;
            background-color: #ecf0f1;
            padding: 10px;
            border-left: 5px solid #3498db;
        }

        section {
            margin-bottom: 30px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .info-box {
            background-color: #fdfae3;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #f0e68c;
            margin: 10px 0;
        }

        ul,
        ol {
            margin: 10px 0;
            padding-left: 25px;
        }

        table {
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #3498db;
            border: 1px solid #2980b9;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            text-align: center;
        }

        td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            text-align: center;
            border-bottom: 1px solid #ecf0f1;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .php-section {
            background-color: #f8f9fa;
            border: 2px dashed #6c757d;
            padding: 15px;
            margin: 10px 0;
            min-height: 60px;
        }

        .noticia-nueva {
            font-weight: bold;
            color: #27ae60;
        }
    </style>
</head>

<body>
    <h1>Examen Práctico PHP - UT03</h1>

    <section>
        <h2>UT03: Ejercicio 1: Conteo de Votos (2 puntos)</h2>
        <p>Define una función que reciba el array <strong>$votos</strong>, cuente cuántas veces aparece cada voto y guarde el resultado en un array asociativo. Devuelve dicho array e imprímelo con <strong>print_r</strong>.</p>
        <p>Funciones útiles:</p>
        <ul>
            <li>isset()</li>
        </ul>
        <div class="php-section">
            <?php
            $votos = ['aplazar_examen', 'mantener_examen', 'aprobado_general', 'aplazar_examen', 'aplazar_examen', 'aprobado_general'];
            if (isset($votos)) {
                function conteo($votos)
                {

                    $contado = array_count_values($votos);
                    return $contado;
                }
            }
            print_r(conteo($votos));


            ?>
        </div>
    </section>


    <section>
        <h2>UT03: Ejercicio 2: IVA por Referencia (2 puntos)</h2>
        <p>Crea una función que acepte un número por referencia. La función <strong>debe modificar el valor original</strong>, multiplicándolo por 1.21, no puede devolver ningún valor. Llama a la función con un precio e imprime el valor de antes y después de la llamada.</p>

        <div class="php-section">
            <?php
            $precio = 333;
            echo $precio;
            echo '<br>';
            function multi()
            {
                global $precio;
                $precio = $precio * 1.21;
            }
            multi();
            echo $precio;

            ?>
        </div>
    </section>

    <section>
        <h2>UT03: EJERCICIO 3: We Will We Will We We We Will Rock You (2 puntos)</h2>
        <p>Escribe un bucle <strong>for</strong> que itere desde el 1 hasta el 30 (inclusive).</p>
        <ul>
            <li>Si el número es divisible por 3, imprime "We".</li>
            <li>Si el número es divisible por 5, imprime "Will".</li>
            <li>Si el número es divisible por 3 y por 5 (ambos), imprime "<b>Rock You</b>" (sí, en negrita).</li>
            <li>En cualquier otro caso, imprime el número.</li>
        </ul>
        Deberás mostrar los resultados en una lista <strong>no ordenada</strong> de HTML.

        <div class="php-section">
            <ul>
                <?php
                for ($i = 1; $i <= 30; $i++) {
                    if (($i % 3 == 0) && ($i % 5 == 0)) {
                        echo '<li><b>Rock you</b></li>';
                    }elseif($i % 3 == 0) {
                        echo '<li>We</li>';
                    }
                     elseif ($i % 5 == 0) {
                        echo '<li>Will</li>';
                    } else {
                        echo "<li>$i</li>";
                    }
                }
                ?>
            </ul>
        </div>
    </section>

    <section>
        <h2>UT03: EJERCICIO 4: Arrays y Bucles (4 Puntos)</h2>
        <p>Dado el array de productos en una cesta de la compra, debes usar un bucle <strong>foreach</strong> para:</p>
        <ul>
            <li>Mostrar todos los productos, sus precios, cantidades y el total parcial en una tabla HTML.</li>
            <li>Calcular y mostrar el precio total de la cesta (la suma de todos los precios).</li>
        </ul>
        <p>Aquí tienes una tabla de ejemplo:</p>
        <table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio (€)</th>
                <th>Total parcial (€)</th>
            </tr>
            <tr>
                <td>Producto 1</td>
                <td>2</td>
                <td>3.5</td>
                <td>7</td>
            </tr>
        </table>

        <div class="php-section">
            <?php
            $cesta = [
                "Plátanos" => [
                    "precio" => 1.20,
                    "cantidad" => 3
                ],
                "Manzanas" => [
                    "precio" => 0.80,
                    "cantidad" => 5
                ],
                "Leche de soja" => [
                    "precio" => 1.20,
                    "cantidad" => 2
                ],
                "Pan" => [
                    "precio" => 0.90,
                    "cantidad" => 1
                ]
            ];
            echo '<table>';
            echo '<tr><th>Producto</th><th>Cantidad</th><th>Precio (€)</th><th>Total Parcial(€)</th></tr>';
            foreach ($cesta as $key => $value) {
                echo '<tr>';
                echo "<td>$key</td>";
                echo "<td>" . $value['cantidad'] . "</td>";
                echo "<td>". $value["precio"] . "</td>";
                echo "<td>". $total_casi = $value["precio"] * $value['cantidad'] . "</td>";
                echo '</tr>';
                $total_final +=  $total_casi;
            }
            echo '</table>';
            echo $total_final;
            ?>
        </div>
    </section>

</body>

</html>