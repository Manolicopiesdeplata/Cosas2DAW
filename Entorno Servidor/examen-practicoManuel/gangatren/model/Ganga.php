<?php

    require_once __DIR__ . "/../database/Database.php";
    require_once __DIR__ . "/Categoria.php";
    class Ganga {
        private $id;
        private $titulo;
        private $descripcion;
        private $precio;

        public function __construct($id = null, $titulo = null, $descripcion = null, $precio = null) {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getPrecio() {
            return $this->precio;
        }

        public function setPrecio($precio) {
            $this->precio = $precio;
        }

        public static function getAll() {
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_gangas = $connection->query(OBTENER_TODAS_LAS_GANGAS);
            $gangas = [];
            while ($row = $result_gangas->fetchArray(SQLITE3_ASSOC)) {
                $gangas[] = new Ganga($row['id'], $row['titulo'], $row['descripcion'], $row['precio']);
            }
            return $gangas;
        }

        public static function getByCategoria($categoria_id) {
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $gangas_categoria_query = $connection->prepare(OBTENER_GANGAS_POR_CATEGORIA_ID);
            $gangas_categoria_query->bindValue(':categoria_id', $categoria_id, SQLITE3_INTEGER);
            $result_gangas = $gangas_categoria_query->execute();
            $gangas = [];
            while ($row = $result_gangas->fetchArray(SQLITE3_ASSOC)) {
                $gangas[] = new Ganga($row['id'], $row['titulo'], $row['descripcion'], $row['precio']);
            }
            return $gangas;
        }

        public function categorias() {
            return Categoria::getByGanga($this->getId());
        }

        public function likes() {
            $db = Database::getInstance();
            $ganga_likes_query = $db->getConnection()->prepare(OBTENER_NUMERO_DE_LIKES_POR_GANGA_ID);
            $ganga_likes_query->bindValue(':ganga_id', $this->getId(), SQLITE3_INTEGER);
            $result_likes = $ganga_likes_query->execute();
            $ganga_likes = $result_likes->fetchArray(SQLITE3_ASSOC)['like_count'];
            return $ganga_likes;
        }
    }

?>