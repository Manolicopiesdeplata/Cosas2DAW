<?php

    require_once __DIR__ . "/../database/Database.php";
    require_once __DIR__ . "/Ganga.php";
    class Categoria {
        private $id;
        private $nombre;
        private $descripcion;

        public function __construct($id = null, $nombre = null, $descripcion = null) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public static function getById($categoria_id) {
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $categoria_query = $connection->prepare(OBTENER_CATEGORIA_POR_ID);
            $categoria_query->bindValue(':id', $categoria_id, SQLITE3_INTEGER);
            $categoria_result = $categoria_query->execute();
            $categoria_row = $categoria_result->fetchArray(SQLITE3_ASSOC);
             if (!$categoria_row) {
                return null;
            } else {
                $categoria = new Categoria($categoria_row['id'], $categoria_row['nombre']);
                return $categoria;
            }
        }
        public function gangas() {
            return Ganga::getByCategoria($this->getId());
        }
        public static function getByGanga($ganga_id) {
            $db = Database::getInstance();
            $categorias_query = $db->getConnection()->prepare(OBTENER_CATEGORIAS_POR_GANGA_ID);
            $categorias_query->bindValue(':ganga_id', $ganga_id, SQLITE3_INTEGER);
            $result_categorias = $categorias_query->execute();
            $categorias = [];
            while ($categoria = $result_categorias->fetchArray(SQLITE3_ASSOC)) {
                $categorias[] = new Categoria($categoria['id'], $categoria['nombre'], $categoria['descripcion']);
            }
            return $categorias;
        }
        public static function getAll() {
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_categorias = $connection->query(OBTENER_TODAS_LAS_CATEGORIAS);
            $categorias = [];
            while ($categoria = $result_categorias->fetchArray(SQLITE3_ASSOC)) {
                $categorias[] = new categoria($categoria['id'], $categoria['nombre'], $categoria['descripcion']);
            }
            return $categorias;
        }
        public function nGangas() {
            $db = Database::getInstance();
            $n_gangas_query = $db->getConnection()->prepare(OBTENER_NUMERO_DE_GANGAS_POR_CATEGORIA_ID);
            $n_gangas_query->bindValue(':categoria_id', $this->getId(), SQLITE3_INTEGER);
            $result_n_gangas = $n_gangas_query->execute();
            $n_gangas = $result_n_gangas->fetchArray(SQLITE3_ASSOC)['n_gangas'];
            return $n_gangas;
        }
    }

?>