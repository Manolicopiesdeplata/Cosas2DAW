<?php
require_once "BBDD.php";


class Cliente{
    public function guardar() {
        $bbdd = BBDD::get_instance() ;
        $bbdd->guardar('cliente');
    }
}