<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frase</title>
</head>
<body>
    <p></strong> "<?= htmlspecialchars($frase->getTexto()); ?>"</p>
    <p><em>- <?= htmlspecialchars($frase->getAutor()); ?></em></p>
    <a href="index.php?action=all">Volver</a>
</body>
</html>