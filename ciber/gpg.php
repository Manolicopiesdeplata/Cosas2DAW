<?php

$mostrar = false;
$mensaje = "";
$cmd_import = "";
$cmd_verify = "";

if (isset($_POST['enviar'])) {

    $mostrar = true;

    $clave   = $_FILES['clave']['tmp_name'];
    $archivo = $_FILES['archivo']['tmp_name'];
    $firma   = $_FILES['firma']['tmp_name'];

    if (!$clave || !$archivo || !$firma) {
        $mensaje = "Faltan archivos.";
    } else {

        $cmd_import = "gpg --import \"$clave\" 2>&1";

        $cmd_verify = "gpg --verify \"$firma\" \"$archivo\" 2>&1";

        $out_import = shell_exec($cmd_import);
        $out_verify = shell_exec($cmd_verify);

        if (strpos($out_verify, "Good signature") !== false) {
            $mensaje = "✔ VERIFICACIÓN CORRECTA — La firma es válida.";
        } else {
            $mensaje = "✘ VERIFICACIÓN FALLIDA — La firma NO coincide.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <h1>VALIDADOR DE SOFTWARE</h1>
    <div id="formulario">
        <form method="post" enctype="multipart/form-data">
            <div class="archivo">
                <p><b>1. Clave publica desarrollador</b> (.asc)</p>
                <input type="file" name="clave" required accept=".asc, text/plain">
            </div>
            <div class="archivo">
                <p><b>2. Archivo Original</b></p>
                <input type="file" name="archivo" required>
            </div>
            <div class="archivo">
                <p><b>3. Firma desarrollador</b> (.sig o .asc)</p>
                <input type="file" name="firma" required accept=".sig, .asc">
            </div>
            <br>
            <button id="comprobar" type="submit" name="enviar">Comprobar</button>
        </form>
    </div>
    <?php if ($mostrar): ?>

        <hr>
        <h2>Resultado:</h2>
        <pre><?php echo htmlspecialchars($mensaje); ?></pre>

        <h3>Comando IMPORT:</h3>
        <pre><?php echo htmlspecialchars($cmd_import); ?></pre>

        <h3>Comando VERIFY:</h3>
        <pre><?php echo htmlspecialchars($cmd_verify); ?></pre>

    <?php endif; ?>
</body>

</html>