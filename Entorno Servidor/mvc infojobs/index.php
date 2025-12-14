<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'borrar':
            if (isset($_POST['id'])) {
                $ofertaTrabajoController->borrarOferta($_POST['id']);
            }
            break;
        case 'crear':
            if (isset($_POST['descripcion'], $_POST['salario'], $_POST['empresa'], $_POST['ubicacion'])) {
                $ofertaTrabajoController->crearOferta($_POST['descripcion'], $_POST['salario'], $_POST['empresa'], $_POST['ubicacion']);
            }
            break;
        default:
            echo 'me da que esto no va eh?';
            break;
    }
}

$action = $_GET['action'] ?? 'ofertas_trabajo';

switch ($action) {
    case 'ofertas_trabajo':
        $ofertaTrabajoController->listarOfertas();
        break;

    case 'crearOferta':
        require_once 'formulario_ofertas.php';
        break;

    case 'verOferta':
        require_once 'ver_oferta.php';
        break;
}
