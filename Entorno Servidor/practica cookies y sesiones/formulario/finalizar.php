<?php
    session_start();
    session_unset();
    session_destroy();

?>
<!DOCTYPE html>
<html lang="es">
<head><title>Registro Completado</title></head>
<body>
    <h1 style="color: green;">¡Registro Completado!</h1>
    <p>Tus datos han sido guardados (simuladamente).</p>
    <p>La sesión ha sido destruida. Si vuelves al paso 1, el formulario estará vacío.</p>
    <a href="index.php">Volver al inicio</a>
</body>
</html>