<?php

class CategoriaController
{
    private static $instance = null;

    private function __construct() {}

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new CategoriaController();
        }
        return self::$instance;
    }
    public function getAll() {
        return Categoria::getAll();
    }

    public function verCategorias() {
        $categorias = $this->getAll();
        require __DIR__ . '/../view/categorias.php';
    }
}
