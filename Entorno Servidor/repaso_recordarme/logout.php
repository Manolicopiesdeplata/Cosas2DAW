<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
    setcookie('recordarme', $_POST['nombre'], time() - (3600 * 24 * 7));
?>