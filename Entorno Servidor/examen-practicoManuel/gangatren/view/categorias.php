<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="gangatren.css">
</head>
<body>
    <ul>
    <?php foreach($categorias as $categoria): ?>
        <li>
            Categoria: <?= $categoria->getNombre() ?>
            <ul>
                <li>Descripcion: <?= $categoria->getDescripcion() ?></li>
                <li>Numero de Gangas: <?= $categoria->nGangas() ?></li>
            </ul>
        </li>
    <?php endforeach ?>
</body>
</html>