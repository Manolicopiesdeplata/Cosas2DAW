<?php
class SessionController
{
    private static $instance = null;

    private function __construct()
    {
        session_start();
    }

    public static function getInstance() {
        if(!self::$instance){
            self::$instance = new SessionController();   
        }
        return self::$instance;
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }

    public function login($email, $password)
    {
        $usuario = Usuario::findByEmail($email);

        if ($usuario && password_verify($password, $usuario->getPassword())) {
            $_SESSION['usuario'] = serialize($usuario);
            return true;
        } else {
            echo 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
        }
    }
    public function verLogin()
    {
        require __DIR__ . '/../view/login.php';
    }

    public function getUsuario()
    {
        $usuario = isset($_SESSION['usuario']) ? unserialize($_SESSION['usuario']) : null;
        return $usuario;
    }
}
