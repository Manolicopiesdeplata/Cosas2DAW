<?php
    require_once __DIR__ . '/config/config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'borrar':
            if (isset($_POST['id'])) {
                $temardoController->borrarTemardo($_POST['id']);
            }
            break;

        case 'anadir':
            if (isset($_POST['dj'], $_POST['tema'])) {
                $temardoController->anadirTemardo($_POST['dj'], $_POST['tema']);
            }
            break;

        default:
            echo 'Acción POST no válida';
            break;
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
        require_once __DIR__ . '/views/anadir.php';
        break;

    default:
        echo 'Página no disponible';
        break;
}
?>