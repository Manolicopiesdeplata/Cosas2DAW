<?php
    require_once 'config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'borrar':
            if (isset($_POST['id'])) {
                $temardoController->borrarTemardo($_POST['id']);
            }
            exit();

        case 'anadir':
            if (isset($_POST['dj'], $_POST['tema'])) {
                $temardoController->anadirTemardo($_POST['dj'], $_POST['tema']);
            }
            exit();

        default:
            echo 'Acción POST no válida';
            exit();
    }
}

$action = $_GET['action'] ?? 'mostrar_temardo';

switch ($action) {
    case 'mostrar_temardo':
        $temardoController->temardoAleatorio();
        break;

    case 'admin':
        $temardoController->adminTemardos();
        break;

    case 'anadir_temardo':
        require_once 'anadir.php';
        break;

    default:
        echo 'Página no disponible';
        break;
}
?>