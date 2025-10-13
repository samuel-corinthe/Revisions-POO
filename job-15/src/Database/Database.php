<?php
namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'draft_shop';
    private const DB_USER = 'root';
    private const DB_PASS = '';

    private function __construct() {}
    private function __clone() {}

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8',
                    self::DB_USER,
                    self::DB_PASS
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
        }
        return self::$instance;
    }

    public static function getConnexion(): PDO
    {
        return self::getInstance();
    }
} 

