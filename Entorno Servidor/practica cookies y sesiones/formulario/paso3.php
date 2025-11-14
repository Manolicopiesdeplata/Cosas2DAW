<?php
session_start();
    $nombre = $_SESSION["nombre"];
    $email = $_SESSION["email"];
    $direccion = $_SESSION["direccion"];
    $ciudad = $_SESSION["ciudad"];
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Registro - Paso 3</title></head>
<body>
    <h1>Paso 3: Revisar Datos</h1>
    
    <h3>Datos Personales (de paso 1)</h3>
    <p>Nombre: <?= htmlspecialchars($nombre); ?></p>
    <p>Email: <?= htmlspecialchars($email); ?></p>
    <a href="index.php">Modificar</a>

    <h3>Dirección (de paso 2)</h3>
    <p>Dirección: <?= htmlspecialchars($direccion); ?></p>
    <p>Ciudad: <?= htmlspecialchars($ciudad); ?></p>
    <a href="paso2.php">Modificar</a>

    <hr>
    <form action="finalizar.php" method="POST">
        <button type="submit">¡Confirmar y Finalizar Registro!</button>
    </form>
</body>
</html>