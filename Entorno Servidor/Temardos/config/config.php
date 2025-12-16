<?php
    require_once __DIR__ . '/../controller/TemardoController.php';
    require_once 'Database.php';
    new Database();
    $temardoController = new TemardoController();
?>