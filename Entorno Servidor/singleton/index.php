<?php
    require_once 'Cliente.php';
    require_once 'Reserva.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $cliente01 = new Cliente();
    $cliente02 = new Cliente();
    $cliente03 = new Cliente();
    $cliente04 = new Cliente();
    $cliente05 = new Cliente();
    $cliente06 = new Cliente();
    $cliente07 = new Cliente();
    $cliente08 = new Cliente();
    $cliente09 = new Cliente();
    $cliente10 = new Cliente();
    $reserva01 = new Reserva();
    $reserva02 = new Reserva();
    $reserva03 = new Reserva();
    $reserva04 = new Reserva();
    $reserva05 = new Reserva();
    $cliente01->guardar();
    $cliente02->guardar();
    $cliente03->guardar();
    $cliente04->guardar();
    $cliente05->guardar();
    $cliente06->guardar();
    $cliente07->guardar();
    $cliente08->guardar();
    $cliente09->guardar();
    $cliente10->guardar();
    $reserva01->guardar();
    $reserva02->guardar();
    $reserva03->guardar();
    $reserva04->guardar();
    $reserva05->guardar();


    ?>    
</body>
</html>