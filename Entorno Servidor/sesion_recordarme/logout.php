<?php
    // Destruir sesión y eliminar cookie
    session_start();
    session_unset();
    session_destroy();
    setcookie('token_recordarme', '', time() - 3600, "/");

    header('Location: login.php');
    exit;
?>