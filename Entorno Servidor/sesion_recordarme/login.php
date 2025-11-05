<?php
require_once 'usuarios.php';
session_start();

$error = null;

// Si el usuario ya está logueado
if (isset($_SESSION['id_usuario'])) {
    header('Location: index.php');
    exit;
}

// --- Si existe la cookie token_recordarme, buscamos a qué usuario pertenece ---
$usuario_guardado = '';
if (isset($_COOKIE['token_recordarme'])) {
    $token = $_COOKIE['token_recordarme'];

    foreach ($usuarios as $nombre => $datos) {
        if ($datos['token'] === $token) {
            $usuario_guardado = $nombre; // Lo usamos solo para rellenar el input
            break;
        }
    }
}

// --- Si se envía el formulario ---
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
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <div>
            <label>Usuario:</label>
            <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario_guardado); ?>">
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="checkbox" name="recordarme" <?php if ($usuario_guardado) echo 'checked'; ?>>
            <label>Recordarme</label>
        </div>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
