<?php
    setcookie('profiler', '', time() - 3600);
    header('Location: index.php');
?>