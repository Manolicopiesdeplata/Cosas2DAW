<?php
    require_once __DIR__ . '/../model/Frase.php';

    class FraseController {


        public function getAll() {
            $frases = Frase::all();
            require __DIR__ . '/../view/frase/index.php';
        }

        public function random() {
            $frase = Frase::random();
            require __DIR__ . '/../view/frase/random.php';
        }
        public function show($id) {
            $frase = Frase::byId($id);
            require __DIR__ . '/../view/frase/show.php';
        }

        public function autor($autor) {
            $frases = Frase::byAutor($autor);
            require __DIR__ . '/../view/frase/index.php';
        }

        public function texto($texto) {
            $frases = Frase::byTexto($texto);
            require __DIR__ . '/../view/frase/index.php';
        }
    }

?>