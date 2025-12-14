<?php
class Database
{
    private $sqlite_file = 'database.sqlite';
    private static $db_connection;

    public function __construct()
    {
        self::$db_connection = new SQLite3($this->sqlite_file);
        $this->initializeDatabase();
    }

    private function initializeDatabase()
    {
        self::$db_connection->exec('CREATE TABLE IF NOT EXISTS ofertas_trabajo(id INTEGER PRIMARY KEY, descripcion TEXT, salario TEXT, empresa TEXT, ubicacion TEXT)');
    }

    public static function getConnection()
    {
        return self::$db_connection;
    }
}
?>