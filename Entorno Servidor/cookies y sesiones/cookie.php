<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {
    $colorin = $_POST['color'];
    setcookie('color_favorito', $colorin, time() + (30 * 24 * 60 * 60));
}
header('Location: colorado.php');
?>