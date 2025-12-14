<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva oferta de trabajo</title>
</head>
<body>
    <h1>Nueva oferta de trabajo</h1>
    <form action="index.php" method="POST">
        <input type="hidden" name="action" value="crear">
        <label for="descripcion">Descripción:</label><br>
        <input type="text" id="descripcion" name="descripcion" required><br><br>
        <label for="salario">Salario:</label><br>
        <input type="text" id="salario" name="salario" required><br><br>
        <label for="empresa">Empresa:</label><br>
        <input type="text" id="empresa" name="empresa" required><br><br>
        <label for="ubicacion">Ubicación:</label><br>
        <input type="text" id="ubicacion" name="ubicacion" required><br><br>
        <input type="submit" style="padding: 4px 8px; border-radius: 4px; cursor: pointer; font-weight: bold;" value="Crear oferta">
    </form>
    <p>Volver al <a href="index.php">listado de ofertas</a></p>
</body>
</html>