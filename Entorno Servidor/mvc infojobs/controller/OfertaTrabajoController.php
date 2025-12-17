<?php

    require_once __DIR__ . '/../model/OfertaTrabajo.php';
    class OfertaTrabajoController {
        public function listarOfertas() {
            $ofertas = OfertaTrabajo::getAll();
            require_once __DIR__ . '/../views/ofertas_trabajo.php';
        }
        
        public function verOferta($id) {
            $oferta = OfertaTrabajo::getById($id);
            require_once __DIR__ . '/../views/ver_oferta.php';
        }
        public function borrarOferta($id) {
            $oferta = new OfertaTrabajo($id, '', '', '', '');
            $oferta->delete();
            header('Location: ../index.php');
        }

        public function crearOferta($descripcion, $salario, $empresa, $ubicacion) {
            $oferta = new OfertaTrabajo(null, $descripcion, $salario, $empresa, $ubicacion);
            $oferta->save();
            header('Location: ../index.php');
        }

    }