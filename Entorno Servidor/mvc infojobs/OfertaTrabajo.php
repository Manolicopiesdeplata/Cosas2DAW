<?php

    require_once 'Database.php';
    require_once 'config.php';

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
            $db = Database::getConnection();
            $stmt = $db->prepare('INSERT INTO ofertas_trabajo(descripcion, salario, empresa, ubicacion) VALUES (:descripcion, :salario, :empresa, :ubicacion)');
            $stmt->bindValue(':descripcion', $this->descripcion, SQLITE3_TEXT);
            $stmt->bindValue(':salario', $this->salario, SQLITE3_TEXT);
            $stmt->bindValue(':empresa', $this->empresa, SQLITE3_TEXT);
            $stmt->bindValue(':ubicacion', $this->ubicacion, SQLITE3_TEXT);
            $stmt->execute();
            $this->id = $db->lastInsertRowID();
        }

        public function delete() {
            $db = Database::getConnection();
            $stmt = $db->prepare('DELETE FROM ofertas_trabajo WHERE id = :id');
            $stmt->bindValue(':id', $this->id, SQLITE3_INTEGER);
            $stmt->execute();
        }

        public static function getAll() {
            $db = Database::getConnection();
            $result = $db->query('SELECT * FROM ofertas_trabajo');
            $ofertas = [];
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $ofertas[] = new OfertaTrabajo($row['id'], $row['descripcion'], $row['salario'], $row['empresa'], $row['ubicacion']);
            }
            return $ofertas;
        }

        public static function getById($id) {
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT * FROM ofertas_trabajo WHERE id = :id');
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
            $result = $stmt->execute();
            $row = $result->fetchArray(SQLITE3_ASSOC);
            if($row) {
                return new OfertaTrabajo($row['id'], $row['descripcion'], $row['salario'], $row['empresa'], $row['ubicacion']);
            }
            return null;
        }
    }
?>