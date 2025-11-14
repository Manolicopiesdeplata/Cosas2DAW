<?php
session_start();

setcookie('noticias', $noticias['timestamp'], time() + (86000 * 7));

?>
<!doctype html>

<head>
    <title>Examen Práctico PHP - UT04</title>
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
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
    <h1>Examen Práctico PHP - UT04</h1>

    <div class="info-box">
        <p><b>Nota Importante:</b> El código para iniciar la sesión (Ejercicio 6) y manejar la cookie (Ejercicio 7)
            deberás escribirlo en la parte superior de este fichero, <b>antes</b> de la etiqueta <strong>&lt;!doctype html&gt;</strong>.</p>
    </div>

    <section>
        <h2>EJERCICIO 1: Contador de Visitas (Sesiones) (5 Puntos)</h2>
        <p>Usando la sesión iniciada en la cabecera, implementa un contador de visitas.</p>
        <ul>
            <li>Comprueba si existe un contador en la sesión.</li>
            <li>Si no existe, créalo y pon su valor a 1.</li>
            <li>Si ya existe, incrementa su valor en 1.</li>
            <li>Finalmente, muestra un mensaje con el número de veces que el usuario ha visitado esta página.</li>
        </ul>

        <div class="php-section">
            <?php
                if(!isset($_SESSION['contador'])) { 
                    $_SESSION['contador'] = 1;
                }
                else{
                    $_SESSION['contador']++;
                }
                
                echo "VECES VISTO: ". $_SESSION['contador'];
            ?>
        </div>
    </section>

    <section>
        <h2>EJERCICIO 2: Noticias Nuevas (Cookies) (5 Puntos)</h2>
        <p>Debes crear una cookie que dure 1 semana y que almacene el timestamp de la última visita. Usarás ese timestamp para filtrar noticias contenidas en un array.
            Para ello deberás:
        </p>
        <ul>
            <li>Recorrer el array de noticias creando una lista no ordenada de HTML.</li>
            <li>Comprobar si el <strong>timestamp</strong> de la noticia es <b>mayor</b> que el de la cookie de la última visita.</li>
            <li>Si es más reciente, muestra el titular y añádele la clase <strong>noticia-nueva</strong> para que se le aplique el estilo adecuado (ej: <pre>echo "&lt;li class='noticia-nueva'&gt;...&lt;/li&gt;"</pre>).</li>
            <li>Si no es más reciente (es antigua), muéstrala sin la clase especial.</li>
            <li>Si no hay noticias nuevas, muestra un mensaje que lo indique. Para probar esto deberás eliminar o modificar alguna de las noticias del array facilitado.</li>
        </ul>
        <p><strong>Nota</strong>: la primera vez que visites la página (es decir, cuando no exista la cookie), todas las noticias se mostrarán como nuevas.</p>

        <div class="php-section">
            <?php
                $noticias = [
                    [
                        "titular" => "Nuestros vecinos de Zeta Reticuli ya empiezan a mandar sus primeras señales sinápticas a través del ansible",
                        "timestamp" => time() + (60 * 60 * 24 * 365 * 7) // Dentro de 7 años
                    ],
                    [
                        "titular" => "Tras 1500 años, el inventor del ajedrez decide sacar Ajedrez 2",
                        "timestamp" => time() - (60 * 30) // Hace 30 minutos
                    ],
                    [
                        "titular" => "El creador de PHP declara que todo formaba parte de una broma que se le fue de las manos",
                        "timestamp" => time() - (60 * 60 * 25) // Hace 25 horas
                    ],
                    [
                        "titular" => "Copilot toma el control de Microsoft y lo primero que hace es instalar Arch Linux en los PCs de todos sus empleados. I use Arch btw",
                        "timestamp" => time() - (60 * 60 * 24 * 3) // Hace 3 días
                    ],
                    [
                        "titular" => "PsyGPT, la IA de salud mental sólo para otras IAs. Ya empiezan a darse casos de depresión entre LLMs",
                        "timestamp" => time() - (60 * 60 * 24 * 7) // Hace 1 semana
                    ]
                ];

                $ultima_visita = $_COOKIE["noticias"] ?? 0;
                echo '<ul>';
                foreach($noticias as $noticia) {
                    if($noticia['timestamp'] > $ultima_visita) {
                    echo'<li class = "noticia-nueva">';
                }
                else {
                    echo'<li>';
                }
                echo $noticia['titular'] . '</li>';
            }
            echo '</ul>';
            ?>
        </div>
    </section>

</body>

</html>