<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/database/Database.php';
        require_once __DIR__ . '/model/Usuario.php';

        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = Database::getInstance();
        $conn = $db->getConnection();

        $usuario = new Usuario(null, $nickname, $email, $password);

        

        if ($usuario->signup()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error al registrar el usuario.";
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="gangatren.css">
</head>
<body>
    <main id="signup-container">
    <h1>Regístrate</h1>
        <form method="POST">
            <label for="nickname">Nickname:</label>
            <input type="text" id="nickname" name="nickname" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Registrarse</button>
            <a href="/index.php">Volver al inicio</a>
        </form>
    </main>
</body>
</html>