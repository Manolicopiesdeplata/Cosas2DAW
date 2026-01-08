<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frase Aleatoria</title>
</head>
<body>
    <h1>Frase aleatoria <a href="index.php">&#128472;</a></h1>
    <p></strong> "<?= htmlspecialchars($frase->getTexto()); ?>"</p>
    <p><em>- <?= htmlspecialchars($frase->getAutor()); ?></em></p>
    <a href="index.php?action=show&id=<?= $frase->getId(); ?>">Ver frase</a><br>
    <a href="index.php?action=all">Ver todas las frases</a><br>
    <a href="index.php?action=persona&autor=<?= urlencode($frase->getAutor()) ?>">Ver más frases de <?= htmlspecialchars($frase->getAutor()) ?></a><br>
</body>
</html>