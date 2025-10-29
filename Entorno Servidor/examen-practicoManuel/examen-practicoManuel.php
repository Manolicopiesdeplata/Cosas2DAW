<!doctype html>
<head>
    <title>Examen Práctico PHP - UT02</title>
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
            background-color: #d5dbdb;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        ul, ol {
            margin: 10px 0;
            padding-left: 25px;
        }
        .php-section {
            background-color: #f8f9fa;
            border: 2px dashed #6c757d;
            padding: 15px;
            margin: 10px 0;
            min-height: 60px;
        }
        sup {
            font-size: 0.8em;
        }
    </style>
</head>
<body>

    <h1>Examen Práctico PHP - Unidad 02</h1>
    
    <div class="info-box">
        <p><strong>Instrucciones:</strong></p>
        <ul>
            <li>Implementa las soluciones en este mismo archivo dentro de las secciones PHP indicadas</li>
            <li>Cada ejercicio debe mostrar claramente los resultados con echo, var_dump() o print_r()</li>
            <li>Comenta tu código cuando sea necesario para explicar la lógica</li>
            <li>Se valorará la correcta aplicación de los conceptos y la claridad del código</li>
        </ul>
    </div>

    <section>
        <h2>Ejercicio 1 — Análisis de tipos y conversiones (0.75 puntos)</h2>
        <p>Realiza las siguientes tareas relacionadas con tipos de datos y casting:</p>
        
        <p><strong>1.1)</strong> Declara las siguientes variables y muestra su tipo y valor usando <code>var_dump()</code>:</p>
        <ul>
            <li>Una variable con el texto "2024"</li>
            <li>Una variable con el número 42.5</li>
            <li>Una variable con valor booleano false</li>
            <li>Una variable con el valor null</li>
        </ul>

        <p><strong>1.2)</strong> Realiza las siguientes conversiones y explica el resultado:</p>
        <ul>
            <li>Convierte "15.7abc" a int y a float</li>
            <li>Convierte el número 0 y el número -5 a booleano</li>
            <li>Convierte las cadenas "", "0" y "false" a booleano</li>
        </ul>

        <p><strong>1.3)</strong> ¿Cuál será el resultado de las siguientes comparaciones? Escribe tu predicción como comentario y luego verifica con código:</p>
        <ul>
            <li><code>"123" == 123</code></li>
            <li><code>"123" === 123</code></li>
            <li><code>true == 1</code></li>
            <li><code>false === 0</code></li>
        </ul>

        <div class="php-section">
            <?php
            echo "PARTE 1 <br>";
            echo var_dump($anio = "2025") . "<br>";
            echo var_dump($decimal = 42.5) . "<br>";
            echo var_dump($booleano = false). "<br>";
            echo var_dump($nulo = null) . "<br>";
            echo "PARTE 2 <br>";
            $stringInt = "15.7abc";
            $cero = 0;
            $menos = -5;
            echo $converInt = (int) $stringInt . " lo coge si primero en la cadena salen numeros<br>";
            echo $converFlo = (float) $stringInt . " lo mismo de arriba, solo que este coge el entero<br>";
            echo $convertbool1 = (boolean) $cero . " lo convierte a boolean, no sale nada porque 0 es false en bool<br>";
            echo $convertbool2 = (boolean) $menos . " aqui sin embargo da 1 lo cual es true, porque no da el valor 0<br>";
            echo $convertbool3 = (boolean) "" . " no hay nada, lo cual es false<br>";
            echo $convertbool4 = (boolean) "0" . " da nada porque 0 en boolean es false<br>";
            echo $convertbool5 = (boolean) "false" . " la cadena está llena por lo cual es true<br>";
            echo "PARTE 3<br>";
            echo "aqui saldrá 1 porque los valores son los mismos: <br>";
            echo "123" == 123;
            echo "aqui no saldrá nada porque los tipos no son los mismos: <br>";
            echo "123" === 123;
            echo "aqui deberia salir 1 porque true y 1 son iguales: <br>";
            echo true == 1;
            echo "aqui no saldria nada porque los tipos son diferentes: <br>";
            echo false === 0;







            ?>
        </div>
    </section>

    <section>
        <h2>Ejercicio 2 — Operaciones y lógica (0.75 puntos)</h2>
        
        <p><strong>2.1)</strong> Declara dos variables numéricas (<code>$a = 17</code> y <code>$b = 5</code>) y calcula:</p>
        <ul>
            <li>La división con resultado decimal</li>
            <li>El resto de la división</li>
            <li>Comprueba si $a es divisible por $b. <b>Nota</b>: "ser divisible" implica una división con resto 0</li>
        </ul>

        <p><strong>2.2)</strong> Evalúa las siguientes expresiones lógicas y explica por qué dan ese resultado:</p>
        <ul>
            <li><code>(true && false) || (false || true)</code></li>
            <li><code>!(true && false) && true</code></li>
        </ul>

        <p><strong>2.3)</strong> Crea una expresión que determine si un número está entre 10 y 50 (inclusive) Y es par. Prueba con los números: 15, 42, 8, 50.</p>

        <div class="php-section">
            <?php
            echo "PARTE 1<br>";
            $a = 17;
            $b = 5;
            echo "division decimal: " . $a / $b . "<br>";
            echo "divison resto: " . $a % $b . "<br>";
            if($a % $b == 0) {
                echo "es divisible<br>";
            }else{
                echo "no es divisible<br>";
            }
            echo ($a > $b && $b > $a) || ($a < $b || $a >= $b);
            echo " da true por el simple hecho de que en medio de los parentesis tenemos un or, en el primer parentesis las funciones tienen que cumplirse, pero una de ellas no lo hace, sin embargo en el segundo parentesis la primera aunque no se cumpla tambien tiene un or por lo cual si la segunda se cumple es valida <br>";
            echo !($a > $b && $b > $a) && $a >= $b;
            echo " tambien da true porque si no se cumple una de las 2 por el not es valido y la condicion fuera del parentesis es correcta<br>";
            if ((42 >= 10 && 42 <= 50) && 42 % 2 == 0){
                echo "42 está in y es divisible <br>";
            }else{
                echo "42 no está in o no es divisible<br>";
            }
            if ((15 >= 10 && 15 <= 50) && 15 % 2 == 0){
                echo "15 está in y es divisible <br>";
            }else{
                echo "15 no está in o no es divisible<br>";
            }
            if ((8 >= 10 && 8 <= 50) && 8 % 2 == 0){
                echo "8 está in y es divisible <br>";
            }else{
                echo "8 no está in o no es divisible<br>";
            }
            if ((50 >= 10 && 50 <= 50) && 50 % 2 == 0){
                echo "50 está in y es divisible <br>";
            }else{
                echo "50 no está in o no es divisible<br>";
            }


            ?>
        </div>
    </section>

    <section>
        <h2>Ejercicio 3 — Manipulación de cadenas (1 punto)</h2>
        
        <p><strong>3.1)</strong> Dada la cadena <code>"    PHP es un Lenguaje de Programación  "</code> :</p>
        <ul>
            <li>Elimina los espacios del principio y final</li>
            <li>Convierte toda la cadena a mayúsculas</li>
            <li>Cuenta cuántos caracteres tiene la cadena limpia</li>
            <li>Reemplaza "php" por "Python" (insensible a mayúsculas)</li>
            <li>Comprueba si contiene la palabra "lenguaje" (insensible a mayúsculas)</li>
        </ul>

        <p><strong>3.2)</strong> Crea tu "nombre de hacker" siguiendo estas reglas:</p>
        <ul>
            <li>Toma tu nombre completo (ejemplo: "Ignacio Mascarell Llorens")</li>
            <li>Convierte a minúsculas</li>
            <li>Reemplaza las vocales: a→@, e→3, i→1, o→0, u→^</li>
            <li>Elimina todos los espacios</li>
            <li>Añade al final los dos últimos dígitos del año actual (25)</li>
        </ul>

        <div class="php-section">
            <?php
                echo "PARTE 1<br>";
                $cadena = '    PHP es un Lenguaje de Programación  ';
                $quitar = trim($cadena);
                echo $quitar . "<br>";
                echo $mayus = strtoupper($cadena) . "<br>";
                echo strlen($quitar) . "<br>";
                echo str_ireplace("php", "Python", $cadena) . "<br>";
                echo stripos($cadena, "lenguaje") . "<br>";
                echo "PARTE 2<br>";
                $nombreCompleto = "Manuel Lopez Medina";
                $minus = strtolower($nombreCompleto);
                $reemplazo = str_ireplace(["a", "e", "i", "o", "u"], ["@", "€", "!", "0", "^"], $minus);
                $dividrNombre = str_ireplace(" ", "", $reemplazo);
                $divAnio = str_split($anio, 2);
                echo $nombreHacker = $dividrNombre . $divAnio[1];

            ?>
        </div>
    </section>

    <section>
        <h2>Ejercicio 4 — Constantes y funcionalidades avanzadas (1 punto)</h2>
        
        <p><strong>4.1)</strong> Muestra información del sistema usando constantes predefinidas:</p>
        <ul>
            <li>La versión de PHP</li>
            <li>El sistema operativo</li>
            <li>El separador de directorios del sistema</li>
            <li>El archivo actual (usa constantes mágicas)</li>
        </ul>

        <p><strong>4.2)</strong> Define las siguientes constantes y úsalas:</p>
        <ul>
            <li>Una constante llamada <code>IVA</code> con valor 0.21</li>
            <li>Una constante llamada <code>DESCUENTO_MAXIMO</code> con valor 50</li>
        </ul>
        
        <p><strong>4.3)</strong> Calcula el precio final de un producto:</p>
        <ul>
            <li>Precio base: 100€</li>
            <li>Aplica un descuento del 15%</li>
            <li>Aplica el IVA sobre el precio con descuento</li>
            <li>Muestra el precio final</li>
        </ul>

        <div class="php-section">
            <?php
            echo PHP_VERSION . "<br>";
            echo PHP_OS . "<br>";
            echo DIRECTORY_SEPARATOR. "<br>";
            echo __file__ . "<br>";
            const IVA = 0.21;
            const DESCUENTO_MAXIMO = 50;
            $precio = 100;
            $descuento = ($precio * 15) / 100;
            $descontado = $precio - $descuento;
            echo $iva = $descontado + ($descontado * IVA);
            
            ?>
        </div>
    </section>

    <section>
    <h2>Ejercicio 5 — Escape (1.5 puntos)</h2>

    <p>Los magnates multimillonarios lo han conseguido, el planeta Tierra es inhabitable.
    Jeffrey Benzos y Elos Munk han diseñado un cohete para poder escapar al planeta de sus sueños: Marte.
    En los viajes espaciales, cada gramo de peso es crucial debido a que determina el consumo de combustible
    en momentos críticos, como la aceleración para despegar y la desaceleración cuando se aproximan a su destino.</p>

    <p>Como buen fan de la criptomoneda Dogo, los coches Telsa y los productos de Amazing que eres, te han encargado
    el diseño del software para el <b>cálculo de los datos</b> necesarios para la fabricación del módulo de escape,
    y los ingenieros aeroespaciales te han dado las siguientes indicaciones:</p>
    <ul>
    <li>El depósito de combustible es cilíndrico. La fórmula para calcular el volumen de un cilindro es: <b>V = π · r<sup>2</sup> · h</b></li>
    <li>Por motivos de integridad estructural, el diámetro máximo del depósito de combustible es de <b>8 metros</b></li>
    <li>El factor de conversión de volumen en <b>metros cúbicos</b> a <b>litros</b> es 1000 (1 metro cúblico equivale a 1000 litros)</li>
    <li>Cada pasajero pesa un máximo de <b>80kg</b>. Por motivos de seguridad, asumiremos que todos los pasajeros tienen este peso. Si alguno lo excede, será descartado de la misión</li>
    <li>El módulo en el que viajan los pasajeros pesa una base de <b>2500kg</b>, pero <b>cada 4 pasajeros</b> hay que realizar una ampliación que aumenta
    el peso en <b>750kg</b></li>
    <li>Durante el despegue se necesitan <b>500 litros</b> de combustible por cada kg de peso</li>
    <li>Durante la desaceleración se necesitan <b>350 litros</b> de combustible por cada kg de peso</li>
    <li>Se aplicará un factor de seguridad de un <b>20% adicional</b></li>
    </ul>
    <p>Deberás declarar una variable con el total de pasajeros y, en base a su valor, realizar y mostrar el resultado
    de los siguientes cálculos:</p>
    <ul>
    <li>Peso total del módulo de escape.
    <li>Litros de combustible necesarios.
    <li>Altura del depósito de combustible.
    </ul>
    <p>Haz pruebas con varios pasajeros y anota los resultados como comentarios.</p>
    <div class="php-section">
    <?php
        $pasajeros = 2;
        $pesoPasajero = 80;
        $pesoModulo = 2500;
        echo "Peso total: " . $pesoTotal = $pasajeros * $pesoPasajero + $pesoModulo . "kg<br>";
        $litrosDespegue = 500 * $pesoTotal;
        $litrosDesacelerar = 350 * $pesoTotal;
        $litrosJuntos = ($litrosDespegue + $litrosDesacelerar) / 1000;
        echo "Litros en metros cubicos: " . $litrosTotales = $litrosJuntos + (($litrosJuntos * 20) / 100) . "<br>";
        echo "Altura: " . round($altura = $litrosTotales / (M_PI * 4**2)) . " metros";

    ?>
    </div>
    </section>

</body>
</html>