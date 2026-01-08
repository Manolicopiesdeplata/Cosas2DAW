<?php
    class Ridiculo {
        private $id;
        private $frase_id;

        public function __construct($id, $frase_id)
        {
            $this->id = $id;
            $this->frase_id = $frase_id;
        }
        public function getId() {
            return $this->id;
        }
        public function getFraseId() {
            return $this->frase_id;
        }
    }

?>