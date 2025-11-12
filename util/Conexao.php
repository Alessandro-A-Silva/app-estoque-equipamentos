<?php

    abstract class Conexao
    {
        private string $server = "localhost"; //127.0.0.1
        private string $dbName = "estoque_equipamentos";
        private string $userName = "root";
        private string $password = "";
        private string $port = "3306";

        public function __construct()
        {
        }

        public function getConexao(): PDO
        {
            $pdo = new PDO("mysql:host=".$this->server.";dbname=".$this->dbName.";port=".$this->port,$this->userName,$this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }