<?php

    class Database {
        private $db_connection;
        private static $instances = [];

        private function __construct($table_name) {
            $this->db_connection = new SQLite3($table_name);
        }

        public static function getInstance($table_name) {
            if (!isset(self::$instances[$table_name])) {
                self::$instances[$table_name] = new Database($table_name);
            }
            return self::$instances[$table_name];
        }

        public function exec($sql) {
            return $this->db_connection->exec($sql);
        }

        public function query($sql) {
            return $this->db_connection->query($sql);
        }
    }

?>