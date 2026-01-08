<?php
    require_once __DIR__ . '/controller/FraseController.php';

    $fraseController = new FraseController();

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $action = $_GET['action'] ?? 'random';

        switch($action) {
            case 'random':
                $fraseController->random();
                break;
            case 'all':
                $fraseController->getAll();
                break;
            case 'show':
                $id_frase = $_GET['id'] ?? null;
                if($id_frase) {
                    $fraseController->show($id_frase);
                } else {
                    $fraseController->getAll();
                }
                break;
            case 'persona':
                $autor = urldecode($_GET['autor']);
                $fraseController->autor($autor);
                break;
        }
    }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        $texto = $_POST['texto'];
        $fraseController->texto($texto);
    }
?>