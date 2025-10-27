<?php
require_once( "src/funciones.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Productos</title>
    <style>
        table, th, td {
            border:  1px solid orange;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>

<body>
        <?= imprimirTabla($productos)?>
        <form action="src/funciones.php" method="post">
            <label>Campos a seleccionar:
                <?php foreach (array_keys($productos[0]) as $cajas): ?>
                    <input type="checkbox"name="CampoASeleccionar[]" value="<?=$cajas?>"><?=ucfirst($cajas)?>
                <?php endforeach; ?>
                <br><br>
            </label>
            <label>Campo a filtrar:
                <select name="filtroProducto">
                    <option value="sc" selected>Sin Campo</option>
                    <?php foreach (array_keys($productos[0]) as $filtro): ?>
                    <option value="<?=substr($filtro, 0, 2)?>"><?=ucfirst($filtro)?></option>
                <?php endforeach; ?>
                   
                </select>
                <br><br>
            </label>
            <label>Funcion de filtrado:
                <select name="conSin">
                    <option value="sin">Sin filtrado</option>
                    <option value="igu">Igual a</option>
                    <option value="con">Contiene</option>
                    <option value="maq">Mayor que</option>
                    <option value="meq">Menor que</option>
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