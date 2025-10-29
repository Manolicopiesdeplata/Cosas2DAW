<?php
    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] :"Invitado";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Bienvenido <?php echo $usuario?></p>
    <form action="logout.php">
        <button>Cerrar sesion</button>
    </form>
</body>
</html>