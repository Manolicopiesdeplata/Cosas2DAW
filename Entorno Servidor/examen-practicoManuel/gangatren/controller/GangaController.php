<?php
require_once __DIR__ . '/../model/Ganga.php';
require_once __DIR__ . '/../model/Categoria.php';
require_once __DIR__ . '/../model/Usuario.php';
require_once __DIR__ . '/SessionController.php';
class GangaController
{
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if(!self::$instance){
            self::$instance = new GangaController();
        }
        return self::$instance;
    }
    public function getAll()
    {
        $gangas = Ganga::getAll();
        $sessionController = SessionController::getInstance();
        $usuario = $sessionController->getUsuario();
        unset($_SESSION['categoria']);
        require __DIR__ . '/../view/gangas.php';
    }

    public function gangasCategoria($categoria_id)
    {
        $categoria = Categoria::getById($categoria_id);
        $sessionController = SessionController::getInstance();
        $usuario = $sessionController->getUsuario();

        if (!$categoria) {
            $error = "Categoría no encontrada.";
        } else {
            $_SESSION['categoria'] = $categoria_id;
        }
        $gangas = $categoria->gangas();
        require __DIR__ . '/../view/gangas.php';
    }

    public function like($ganga_id, $action)
    {
        $sessionController = SessionController::getInstance();
        $usuario = $sessionController->getUsuario();

        if ($usuario !== null && $ganga_id !== null && $action !== null) {
            if ($action === 'like') {
                $usuario->like($ganga_id);
            } else {
                $usuario->dislike($ganga_id);
            }
        }
    }
    
}
