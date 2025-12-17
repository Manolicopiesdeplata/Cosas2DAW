<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta de trabajo</title>
</head>
<body>
    <h1>Detalle de la oferta de trabajo</h1>
    <?php if (isset($oferta)): ?>
        <div style="border: 1px solid #ccc; padding: 10px; border-radius: 10px;">
            <p>
                <strong>Empresa:</strong> <?php echo htmlspecialchars($oferta->getEmpresa()); ?><br>
                <strong>Ubicación:</strong> <?php echo htmlspecialchars($oferta->getUbicacion()); ?><br>
                <strong>Descripción del puesto:</strong> <?php echo htmlspecialchars($oferta->getDescripcion()); ?><br>
                <strong>Salario:</strong> <?php echo htmlspecialchars($oferta->getSalario()); ?><br>
            </p>
        </div>
    <?php else: ?>
        <p>Oferta no encontrada.</p>
    <?php endif; ?>
    <p><a href="index.php?action=listar_ofertas">Volver al listado de ofertas</a></p>
</body>
</html>