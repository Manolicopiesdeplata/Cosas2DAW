<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado ofertas de trabajo</title>
</head>
<body>
    <h1>Listado ofertas de trabajo</h1>
    <?php foreach ($ofertas as $oferta): ?>
        <div style="border: 1px solid #ccc; padding: 5px 10px; margin-bottom: 10px; border-radius: 10px;">
            <p>
                <strong><?php echo htmlspecialchars($oferta->getEmpresa()); ?></strong> (<?php echo htmlspecialchars($oferta->getUbicacion()); ?>)<br>
                <strong>Descripción del puesto: </strong><?php echo htmlspecialchars($oferta->getDescripcion()); ?><br>
                <strong>Salario: </strong><?php echo htmlspecialchars($oferta->getSalario()); ?><br>
                <form action="index.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $oferta->getId(); ?>">
                    <input type="hidden" name="action" value="borrar">
                    <a href="index.php?action=verOferta&id=<?= $oferta->getId() ?>" style="margin-right: 10px;">Ver detalles de la oferta</a>
                    <input type="submit" style="background-color: #dc3545; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-weight: bold;" value="Eliminar oferta">
                </form>
            </p>
        </div>
    <?php endforeach; ?>
    <a href="index.php?action=crearOferta">Crear nueva oferta de trabajo</a>
</body>
</html>