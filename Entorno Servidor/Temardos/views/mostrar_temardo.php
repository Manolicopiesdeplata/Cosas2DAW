<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TEMARDOS</h1>
    <div id="temardo">
        <?php if($temardo): ?>
            <h2>Recomendacion de temardo</h2>
            <p><?php echo htmlspecialchars($temardo->getDj())?> - <?php echo htmlspecialchars($temardo->getTema()) ?> </p>
        <?php else: ?>
            <p>No hay temardos pa ti sorry</p>
        <?php endif; ?>
    </div>
    <p>Mira todos los temardos que te podemos recomendar: <a href="../index.php?action=admin">Admin</a></p>
    <p>Aqui para añadir temardos: <a href="../index.php?action=anadir_temardo">Añadir</a></p>
</body>
</html>