<?php
namespace MVC\Core;

use PDO;

class PDOFactory
{
    public static function create()
    {
        try {
            $dbhost = $_ENV['DBHOST'];
            $dbname = $_ENV['DBNAME'];
            $dbuser = $_ENV['DBUSER'];
            $dbpass = $_ENV['DBPASS'];
            $dsn = "mysql:host={$dbhost};dbname={$dbname};charset=utf8mb4";
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            return new PDO($dsn, $dbuser, $dbpass, $options);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}