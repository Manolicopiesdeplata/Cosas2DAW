<?php
    require_once __DIR__ . '/../model/OfertaTrabajo.php';

    class OfertaTrabajoController {
        public function crearOferta($descripcion, $salario, $empresa, $ubicacion) {
            $oferta = new OfertaTrabajo(null, $descripcion, $salario, $empresa, $ubicacion);
            $oferta->save();
            header('Location: index.php?action=listar_ofertas');
        }

        public function borrarOferta($id) {
            $oferta = new OfertaTrabajo($id, null, null, null, null);
            $oferta->delete($id);
            header('Location: index.php?action=listar_ofertas');
        }

        public function listarOfertas() {
            $ofertas = OfertaTrabajo::getAll();
            require_once __DIR__ . '/../view/ofertas_trabajo.php';
        }
        public function verOferta($id) {
            $oferta = OfertaTrabajo::getById($id);
            require_once __DIR__ . '/../view/ver_oferta.php';
        }
    }
?>