<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="index.php">
        <input type="hidden" name="action" value="anadir">
        <label for="dj">DJ:</label>
        <input type="text" id="dj" name="dj" required>
        <br>
        <label for="tema">Tema:</label>
        <input type="text" id="tema" name="tema" required>
        <br>
        <button type="submit">Añadir Temardo</button>
    </form>
</body>
</html>