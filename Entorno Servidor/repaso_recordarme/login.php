<?php
    session_start();
    if (isset($_SESSION['nombre'])) {
        header('Location: index.php');
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['recordarme'] = $_POST['recordarme'];
        if (isset($_POST['recordarme'])) {
            setcookie('recordarme', $_POST['nombre'], time() + 3600 * 24 * 7);
        }
        header('Location: index.php');
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>BIENVENIDO</h1>
    <br>
    <form method="POST">
        <label>Nombre:
            <input type="text" name="nombre">
        </label>
        <br>
        <label>Recuerdame
        <input type="checkbox" name="recordarme">
        </label>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>