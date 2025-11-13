<?php

    class Database
    {   
        private static ?PDO $pdo = null;

        public static function getConnection(): PDO
        {
            if (self::$pdo === null) {
                $server   = "localhost";
                $dbName   = "estoque_equipamentos";
                $port     = "3306";
                $userName = "root";
                $password = "";

                $dsn = "mysql:host={$server};dbname={$dbName};port={$port};charset=utf8mb4";
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];

                try{
                    self::$pdo = new PDO($dsn, $userName, $password, $options);
                }
                catch(PDOException $e)
                {
                    throw $e;
                }
            }

            return self::$pdo;
        }

    }