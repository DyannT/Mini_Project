<?php
require_once("models/DBConnect.php");
require_once("models/InterfaceModels/Base.php");
class Post implements Base{
    var $conn;

    public function __construct()
    {
        $this->conn = new DatabaseConnection();
    }

    public function get()
    {
        try {
            $sql = "SELECT * FROM posts ORDER BY id DESC";
            $data = array();
            $stmt = $this->conn->getConn()->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }

            return $data;
        }catch (\Exception $exception){
            return false;
        }

    }

    public function insert($data): bool
    {
        try {
            $sql = "INSERT INTO posts (title, content) VALUES (:title, :content)";
            $stmt = $this->conn->getConn()->prepare($sql);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':content', $data['content']);

            return $stmt->execute();
        }catch (\Exception $exception){
            return false;
        }
    }

    public function delete($data): bool
    {
        try {
            $sql = "DELETE FROM posts WHERE id = :id";
            $stmt = $this->conn->getConn()->prepare($sql);
            $stmt->bindParam(':id', $data['id']);

            return $stmt->execute();
        }catch (\Exception $exception){
            return false;
        }
    }

    public function find($data)
    {
        try {
            $sql = "SELECT * FROM posts WHERE id = :id";
            $stmt = $this->conn->getConn()->prepare($sql);
            $stmt->bindParam(':id', $data['id']);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (\Exception $exception){
            return false;
        }

    }

    public function update($data): bool
    {
        try {
            $sql = "UPDATE posts SET title = :title, content = :content, updated_at = NOW() WHERE id = :id";
            $stmt = $this->conn->getConn()->prepare($sql);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':content', $data['content']);
            $stmt->bindParam(':id', $data['id']);

            return $stmt->execute();
        }catch (\Exception $exception){
            return false;
        }
    }
}
