<?php
require_once 'usuarios.php';
session_start();

// --- Comprobamos si el usuario está logueado ---
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}

// --- Buscamos el nombre del usuario según su id ---
$nombre_usuario = null;
foreach ($usuarios as $nombre => $datos) {
    if ($datos['id'] == $_SESSION['id_usuario']) {
        $nombre_usuario = $nombre;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Privada</title>
</head>
<body>
    <h1>Bienvenido, Usuario <?= htmlspecialchars($nombre_usuario)?></h1>
    <p>Este es el contenido secreto que solo los usuarios logueados pueden ver.</p>
    
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>