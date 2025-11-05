<?php
// Destruir sesión y eliminar cookie
session_start();
session_unset();
session_destroy();
if (isset($_COOKIE['token_recordarme'])) {
    setcookie('token_recordarme', '', time() - 3600, "/");
}

header('Location: login.php');
exit;
