<?php

    require_once __DIR__ . '/queries.php';

    class Database {
        private $sqlite_file = __DIR__ . '/gangatren.sqlite';
        private static $connection;
        private static $instance = null;
        private function __construct() {
            self::$connection = new SQLite3($this->sqlite_file);
            $this->initializeDatabase();
        }

        public static function getInstance() {
            if(!self::$instance){
                self::$instance = new Database();
            }
            return self::$instance;
        }

        private function initializeDatabase() {
            $tableExists = self::$connection->querySingle("SELECT COUNT(*) FROM sqlite_master WHERE type='table' AND name='usuarios';");
            if ($tableExists > 0) {
                return;
            }
            self::$connection->exec(CREATE_USUARIOS_TABLE);
            self::$connection->exec(CREATE_CATEGORIAS_TABLE);
            self::$connection->exec(CREATE_GANGAS_TABLE);
            self::$connection->exec(CREATE_GANGA_HAS_CATEGORIA_TABLE);
            self::$connection->exec(CREATE_USUARIO_LIKES_TABLE);
            self::$connection->exec(SEEDER);
        }

        public static function getConnection() {
            return self::$connection;
        }

    }

?>