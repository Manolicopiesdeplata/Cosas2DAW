<?php
    require_once 'Temardo.php';
    class TemardoController {
        public function temardoAleatorio() {
            $temardo = Temardo::getRandom();
            require_once 'mostrar_temardo.php';
        }

        public function adminTemardos() {
            $temardos = Temardo::getAll();
            require_once 'admin.php';
        }

        public function borrarTemardo($id) {
            $temardo = new Temardo($id, '', '');
            $temardo->delete();
            header('Location: index.php?action=admin');
        }
        public function anadirTemardo($dj, $tema) {
            $temardo = new Temardo(null, $dj, $tema);
            $temardo->save();
            header('Location: index.php');
        }
    }

?>