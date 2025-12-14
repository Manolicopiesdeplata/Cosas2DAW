<?php
class Database
{
    private $sqlite_file = 'database.sqlite';
    private static $connection;

    public function __construct()
    {
        self::$connection = new SQLite3($this->sqlite_file);
        $this->initializeDatabase();
    }

    private function initializeDatabase()
    {
        self::$connection->exec('CREATE TABLE IF NOT EXISTS temardos (id INTEGER PRIMARY KEY AUTOINCREMENT, dj TEXT, tema TEXT)');
    }

    public static function getConnection()
    {
        return self::$connection;
    }
}
?>