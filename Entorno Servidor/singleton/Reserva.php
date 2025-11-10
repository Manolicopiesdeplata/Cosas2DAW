<?php
require_once "BBDD.php";


class Reserva {
    public function guardar() {
        $bbdd = BBDD::get_instance();
        $bbdd->guardar('reserva');
    }
}