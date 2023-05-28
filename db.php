<?php
require_once 'config.php';

class DB
{
    private static $pdo = null;

    public static function init($dbname = DB_NAME, $username = DB_USERNAME, $password = DB_PASSWORD, $host = DB_HOST)
    {
        self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    private static function executeQuery($query, $params = [])
    {
        if (self::$pdo == null) {
            self::init();
        }

        $stmt = self::$pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public static function querySingle($query, $params = [])
    {
        return self::executeQuery($query, $params)->fetch();
    }

    public static function queryAll($query, $params = [])
    {
        return self::executeQuery($query, $params)->fetchAll();
    }

    public static function tableRows($table)
    {
        return self::queryAll("SELECT * FROM $table;");
    }
}
