<?php
require_once 'usuarios.php';
session_start();

$error = null;
// Verificamos si el usuario ha iniciado sesión
if (isset($_SESSION['id_usuario'])) {
    header('Location: index.php');
    exit;
}

// Verificamos si existe la cookie de "token_recordarme"
if (isset($_COOKIE['token_recordarme'])) {
    // Recupera el usuario según el token de la cookie
    $token = $_COOKIE['token_recordarme'];
    if ($datos['token'] === $token) {
        $usuario_guardado = $nombre;
    }
    header('Location: index.php');
    exit;
}

// Si hemos llegado aquí, significa que no hay sesión ni cookie válida
// Procesamos el formulario de login en caso de que hayamops llegado con un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';
    $usuario = $usuarios[$nombre_usuario] ?? null;

    if ($usuario && $usuario['password'] === $password) {
        // Guardamos sesión
        $_SESSION['id_usuario'] = $usuario['id'];

        // Si marcó “Recordarme”, guardamos su token
        if (isset($_POST['recordarme'])) {
            setcookie('token_recordarme', $usuario['token'], time() + (30 * 24 * 60 * 60), "/");
        } else {
            // Si no, eliminamos la cookie
            setcookie('token_recordarme', '', time() - 3600, "/");
        }

        header('Location: index.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Iniciar Sesión</h1>

    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <div>
            <label>Usuario:</label>
            <input type="text" name="usuario" value='<?= $usuario_guardado ?>'>
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="checkbox" name="recordarme">
            <label>Recordarme</label>
        </div>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>