<?php 
    class Temardo {
        private $id;
        private $dj;
        private $tema;

        public function __construct($id, $dj, $tema) {
            $this->id = $id;
            $this->dj = $dj;
            $this->tema = $tema;
        }

        public function getId() {
            return $this->id;
        }

        public function getDj() {
            return $this->dj;
        }

        public function getTema() {
            return $this->tema;
        }

        public function save() {
            $db = Database::getConnection();
            $stmt = $db->prepare('INSERT INTO temardos(dj, tema) VALUES (:dj, :tema)');
            $stmt->bindValue(':dj', $this->dj, SQLITE3_TEXT);
            $stmt->bindValue(':tema', $this->tema, SQLITE3_TEXT);
            $stmt->execute();
            $this->id = $db->lastInsertRowID();
        }

        public function delete() {
            $db = Database::getConnection();
            $stmt = $db->prepare('DELETE FROM temardos WHERE id = :id');
            $stmt->bindValue(':id', $this->id, SQLITE3_INTEGER);
            $stmt->execute();
        }

        public static function getAll() {
            $db = Database::getConnection();
            $result = $db->query('SELECT * FROM temardos');
            $temardos = [];
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $temardos[] = new Temardo($row['id'], $row['dj'], $row['tema']);
            }
            return $temardos;
        }

        public static function getRandom() {
            $db = Database::getConnection();
            $result = $db->query('SELECT * FROM temardos ORDER BY RANDOM() LIMIT 1');
            $row = $result->fetchArray(SQLITE3_ASSOC);
            if($row) {
                return new Temardo($row['id'], $row['dj'], $row['tema']);
            }
            return null;
        }

        public static function getById($id) {
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT * FROM temardos WHERE id = :id');
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
            $result = $stmt->execute();
            $row = $result->fetchArray(SQLITE3_ASSOC);
            if($row) {
                return new Temardo($row['id'], $row['dj'], $row['tema']);
            }
            return null;
        }
        
    }
?>