<?php
    require_once __DIR__ . '/config/config.php';
    require_once __DIR__ . '/controller/OfertaTrabajoController.php';

    OfertaTrabajo::createTable();
    $ofertatrabajoController = new OfertaTrabajoController();

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $action = $_GET['action'] ?? 'listar_ofertas';

        switch($action) {
            case 'listar_ofertas':
                $ofertatrabajoController->listarOfertas();
                break;
            case 'ir_crear_oferta':
                require_once __DIR__ . '/view/formulario_ofertas.php';
                break;
            case 'ver_oferta':
                $ofertatrabajoController->verOferta($_GET['id']);
                break;
            default:
                echo 'que no va webos';
        }
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_GET['action'];

        switch($action) {
            case 'crear_oferta':
                $ofertatrabajoController->crearOferta($_POST['descripcion'], $_POST['salario'], $_POST['empresa'], $_POST['ubicacion']);
                break;
            case 'borrar_oferta':
                $ofertatrabajoController->borrarOferta($_POST['id']);
                break;
            default:
                echo 'que no va webos';
        }
    }
?>