<?php
require_once "../commons/function.php";

class Category {
    public $conn = null;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function all() {
        $sql = "SELECT * FROM categories ORDER BY category_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $sql = "DELETE FROM categories WHERE category_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function insert($data) {
        $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update($data) {
        $sql = "UPDATE categories SET category_name = :category_name WHERE category_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function find_one($id) {
        $sql = "SELECT * FROM categories WHERE category_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
