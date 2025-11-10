<?php

class BBDD {
    private static $instance;
    private function __construct() {
        echo nl2br("conectando base de datos <br>");
    }

    public static function get_instance() {
        if(self::$instance == null) {
            self::$instance = new BBDD();
        }
        return self::$instance;
    }

    public function guardar($algo) {
        echo nl2br("me cago en $algo \n");
    }
}