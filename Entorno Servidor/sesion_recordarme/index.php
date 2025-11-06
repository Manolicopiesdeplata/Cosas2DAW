<?php
    session_start();

    if(!isset($_SESSION["id_usuario"])){
        header("Location: login.php");
        exit();
    }
    $id = $_SESSION["id_usuario"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Privada</title>
</head>
<body>
    <h1>Bienvenido, Usuario <?= $id ?></h1>
    <p>Este es el contenido secreto que solo los usuarios logueados pueden ver.</p>
    
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>