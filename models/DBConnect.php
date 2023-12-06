<?php

class DatabaseConnection
{
    var $conn;

    public function __construct()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');

            $this->conn = $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getConn(): PDO
    {
        return $this->conn;
    }
}
