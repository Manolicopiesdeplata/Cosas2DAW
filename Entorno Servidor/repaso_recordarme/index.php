<?php
session_start();

if (!isset($_SESSION["nombre"])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['nombre'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>BIENVENIDO <?=$usuario?></h1>
    <p><a href="logout.php">Cerrar sesion</a></p>
</body>

</html>