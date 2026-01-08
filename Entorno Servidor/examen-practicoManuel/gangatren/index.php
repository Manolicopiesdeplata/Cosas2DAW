<?php
require_once __DIR__ . '/controller/GangaController.php';
require_once __DIR__ . '/controller/SessionController.php';
require_once __DIR__ . '/controller/CategoriaController.php';

$sessionController = SessionController::getInstance();
$gangaController = GangaController::getInstance();
$categoriaController = CategoriaController::getInstance();



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $usuario = $sessionController->getUsuario();
    $default_page = isset($usuario) ? 'gangas' : 'login';
    $page = $_GET['page'] ?? $default_page;
    switch ($page) {
        case 'gangas':
            $categoria_id = $_GET['categoria_id'] ?? null;
            if ($categoria_id) {
                $gangaController->gangasCategoria($categoria_id);
            } else {
                $gangaController->getAll();
            }
            break;
        case 'login':
            $sessionController->verLogin();
            break;
        case 'logout':
            $sessionController->logout();
            break;
        case 'categorias':
            $categoriaController->verCategorias();
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page = $_GET['page'] ?? null;
        switch($page) {
            case 'likeDislike':
                $ganga_id = $_POST['ganga_id'] ?? null;
                $action = $_POST['action'] ?? null;
                $gangaController->like($ganga_id, $action);
                $location = isset($_SESSION['categoria']) ? "index.php?categoria_id=" . $_SESSION['categoria'] : "index.php";
                header("Location: $location");
                break;

            case 'login':
                $email = $_POST['email'] ?? null;
                $password = $_POST['password'] ?? null;

                if($sessionController->login($email, $password)) {
                    header('Location: index.php');
                    exit();
                }
                break;
                
        }
}
