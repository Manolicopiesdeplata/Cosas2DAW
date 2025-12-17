<?php

    require_once __DIR__ . '/../data/Database.php';
    require_once __DIR__ . '/../config/config.php';

    class OfertaTrabajo {
        private $id;
        private $descripcion;
        private $salario;
        private $empresa;
        private $ubicacion;
        
        public function __construct($id, $descripcion, $salario, $empresa, $ubicacion) {
            $this->id = $id;
            $this->descripcion = $descripcion;
            $this->salario = $salario;
            $this->empresa = $empresa;
            $this->ubicacion = $ubicacion;
        }

        public function getId() {
            return $this->id;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function getSalario() {
            return $this->salario;
        }

        public function getEmpresa() {
            return $this->empresa;
        }

        public function getUbicacion() {
            return $this->ubicacion;
        }

        public function save() {
            Database::getInstance(DB_FILE)->exec(
                "INSERT INTO ofertas_trabajo (descripcion, salario, empresa, ubicacion) VALUES (
                    '{$this->descripcion}',
                    '{$this->salario}',
                    '{$this->empresa}',
                    '{$this->ubicacion}'
                )"
            );
        }

        public static function delete($id) {
            Database::getInstance(DB_FILE)->exec("DELETE FROM ofertas_trabajo WHERE id = $id");
        }

        public static function getAll() {
            $results = Database::getInstance(DB_FILE)->query("SELECT * FROM ofertas_trabajo");
            $ofertas = [];
            while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                $ofertas[] = new OfertaTrabajo(
                    $row['id'],
                    $row['descripcion'],
                    $row['salario'],
                    $row['empresa'],
                    $row['ubicacion']
                );
            }
            return $ofertas;
        }

        public static function getById($id) {
            $result = Database::getInstance(DB_FILE)->query("SELECT * FROM ofertas_trabajo WHERE id = $id");
            $row = $result->fetchArray(SQLITE3_ASSOC);
            if ($row) {
                return new OfertaTrabajo(
                    $row['id'],
                    $row['descripcion'],
                    $row['salario'],
                    $row['empresa'],
                    $row['ubicacion']
                );
            }
            return null;
        }

        public static function createTable() {
            Database::getInstance(DB_FILE)->exec(
                "CREATE TABLE IF NOT EXISTS ofertas_trabajo (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    descripcion TEXT NOT NULL,
                    salario TEXT NOT NULL,
                    empresa TEXT NOT NULL,
                    ubicacion TEXT NOT NULL
                )"
            );
        }
    }

?>