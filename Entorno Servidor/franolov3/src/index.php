<?php
require_once __DIR__ . ( "/funciones.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Productos</title>
   <link rel="stylesheet" href="estilos.css">
</head>

<body>
        <?= imprimirTabla($productos)?>
        <form action="resultado.php" method="post">
            <label>Campos a seleccionar:
                <?= cajas($productos)?>
                <br><br>
            </label>
            <label>Campo a filtrar:
                <?= lista($productos)?>
                <br><br>
            </label>
            <label>Funcion de filtrado:
                <select name="conOSinFiltrado">
                    <option value="sinFiltrado">Sin filtrado</option>
                    <option value="igual">Igual a</option>
                    <option value="contiene">Contiene</option>
                    <option value="mayorQue">Mayor que</option>
                    <option value="menorQue">Menor que</option>
                </select>
                <br><br>
            </label>
            <label>Criterio:
                <input type="text" name="criterio">
            </label>
            <br><br>
            <label>
                <button type="submit">Enviar</button>
            </label>
        </form>
</body>

</html>