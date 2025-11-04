<?php
    session_start();

    // Aquí no podemos acceder si no hemos iniciado sesión
    $usuario = $_POST["usuario"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Privada</title>
</head>
<body>
    <h1>Bienvenido, Usuario <?= $usuario?></h1>
    <p>Este es el contenido secreto que solo los usuarios logueados pueden ver.</p>
    
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>