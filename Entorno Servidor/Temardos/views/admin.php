<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista completa de temardos</h1>
    <ul>
        <?php foreach ($temardos as $temardo): ?>
            <li><?= htmlspecialchars($temardo->getDj()) ?> - <?= htmlspecialchars($temardo->getTema()) ?>
                <form method="POST" action="../index.php" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $temardo->getId() ?>">
                    <input type="hidden" name="action" value="borrar">
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="../index.php">Vover a recomendacion de temardos</a>
</body>

</html>