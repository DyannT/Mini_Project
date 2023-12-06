<?php
require_once("models/DBConnect.php");
require_once("models/InterfaceModels/Base.php");

class User implements Base
{
    var $conn;

    public function __construct()
    {
        $this->conn = new DatabaseConnection();
    }

    public function checkLogin($data)
    {
        try {
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->conn->getConn()->prepare($sql);
            $stmt->bindParam(':username', $data['username']);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($data['password'], $row['password'])) {
                    return $row['id'];
                }
            }

            return false;
        } catch (\Exception $exception) {
            return false;
        }

    }

    public function find($data){
        try {
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->conn->getConn()->prepare($sql);
            $stmt->bindParam(':username', $data['username']);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Exception $exception) {
            // Handle exceptions as needed
            return false;
        }
    }

    public function insert($data): bool
    {
        try {
            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $stmt = $this->conn->getConn()->prepare($sql);

            $stmt->bindParam(':username', $data['username']);
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $hashedPassword);

            return $stmt->execute();
        } catch (\Exception $exception) {
            return false;
        }
    }

}