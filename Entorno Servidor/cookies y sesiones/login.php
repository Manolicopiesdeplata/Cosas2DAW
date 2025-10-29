<?php
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_SESSION['usuario'] = $_POST['usuario'];
        }
        header('Location:welcome.php');
    ?>