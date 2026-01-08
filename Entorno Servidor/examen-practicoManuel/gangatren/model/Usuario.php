<?php
    
    require_once __DIR__ . "/../database/Database.php";
    class Usuario {
        private $id;
        private $nickname;
        private $email;
        private $password;

        public function __construct($id = null, $nickname = null, $email = null, $password = null) {
            $this->id = $id;
            $this->nickname = $nickname;
            $this->email = $email;
            $this->password = $password;
        }

        public function getId() {
            return $this->id;
        }
        
        public function setId($id) {
            $this->id = $id;
        }

        public function getNickname() {
            return $this->nickname;
        }

        public function setNickname($nickname) {
            $this->nickname = $nickname;
        }
        
        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getPassword() {
            return $this->password;
        }
        
        public function setPassword($password) {
            $this->password = $password;
        }
        public function hasLike($ganga_id) {
            $db = Database::getInstance();
            $usuario_like_query = $db->getConnection()->prepare(USUARIO_HA_LIKEADO_GANGA);
            $usuario_like_query->bindValue(':usuario_id', $this->getId(), SQLITE3_INTEGER);
            $usuario_like_query->bindValue(':ganga_id', $ganga_id, SQLITE3_INTEGER);
            $result_usuario_like = $usuario_like_query->execute();
            $has_liked = $result_usuario_like->fetchArray(SQLITE3_ASSOC)['has_liked'];
            return $has_liked;
        }
        private function likeDislike($like_dislike_query, $ganga_id) {
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $query = $connection->prepare($like_dislike_query, );
            $query->bindValue(':usuario_id', $this->getId(), SQLITE3_INTEGER);
            $query->bindValue(':ganga_id', $ganga_id, SQLITE3_INTEGER);
            $query->execute();
        }
        public function like($ganga_id) {
            $this->likeDislike(USUARIO_DA_LIKE_A_GANGA, $ganga_id);
        }
        public function dislike($ganga_id) {
            $this->likeDislike(USUARIO_DA_DISLIKE_A_GANGA, $ganga_id);
        }
        public static function findByEmail($email) {
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $query = $connection->prepare(OBTENER_USUARIO_POR_EMAIL);
            $query->bindValue(':email', $email, SQLITE3_TEXT);
            $result = $query->execute();
            $usuario_row = $result->fetchArray(SQLITE3_ASSOC);

            $usuario = isset($usuario_row) ? new Usuario($usuario_row['id'], $usuario_row['nickname'], $usuario_row['email'], $usuario_row['password']) : null;
            return $usuario;
        }

        public function signup() {
            $password = password_hash($this->getPassword(), PASSWORD_DEFAULT);
            $db = Database::getInstance();
            $conn = $db->getConnection();
            $insertar_usuario = $conn->prepare(INSERTAR_USUARIO);
            $insertar_usuario->bindValue(':nickname', $this->getNickname(), SQLITE3_TEXT);
            $insertar_usuario->bindValue(':email', $this->getEmail(), SQLITE3_TEXT);
            $insertar_usuario->bindValue(':password', $password, SQLITE3_TEXT);

            $usuario_creado = $insertar_usuario->execute();

            return $usuario_creado;
        }
    }

?>