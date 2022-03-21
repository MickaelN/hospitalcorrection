<?php
class Database
{
    protected static PDO $db;

    /**
     * Méthode pour le singleton
     *
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        if (!isset(self::$db)) {
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db = $pdo;
            } catch (Exception $error) {
                die($error->getMessage());
            }
        }
        return self::$db;
    }

  
}
