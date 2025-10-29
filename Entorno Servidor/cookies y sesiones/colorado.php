<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esto está de puta madre</title>
    <style>
        <?php
    $color = $_COOKIE['color_favorito'];
    echo "b{color: $color;}";
    ?>
    </style>
</head>
<body>
    <p>tu color escogido es el color en hexadecimal <b><?=$color?></b></p>
</body>
</html>