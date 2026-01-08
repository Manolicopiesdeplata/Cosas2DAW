<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="gangatren.css">
</head>

<body>
    <main id="login-container">
        <h1>Iniciar sesión</h1>
        <form method="POST" action="index.php?page=login">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Iniciar sesión</button>
        </form>
        O <a href="signup.php">regístrate aquí</a>
    </main>
</body>

</html>