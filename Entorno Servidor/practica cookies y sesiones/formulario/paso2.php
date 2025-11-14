<?php
session_start();

     $direccion = isset($_SESSION["direccion"]) ? $_SESSION["direccion"] : '';
     $ciudad = isset($_SESSION["ciudad"]) ? $_SESSION["ciudad"] : '';

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $_SESSION["direccion"] = $_POST["direccion"];
    $_SESSION["ciudad"] = $_POST["ciudad"];
    header("Location: paso3.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head><title>Registro - Paso 2</title></head>
<body>
    <h1>Paso 2: Dirección</h1>
    <form method="POST">
        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?= htmlspecialchars($direccion); ?>" required>
        <br>
        <label>Ciudad:</label>
        <input type="text" name="ciudad" value="<?= htmlspecialchars($ciudad); ?>" required>
        <br>
        <a href="index.php">Volver al Paso 1</a>
        <button type="submit">Siguiente</button>
    </form>
</body>
</html>