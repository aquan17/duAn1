<?php
require_once "../commons/function.php";

class Product {
    public $conn = null;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function all() {
        $sql = "SELECT * FROM products ORDER BY product_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $sql = "DELETE FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function insert($data) {
        $sql = "INSERT INTO products (title, discount, image, description, price, quantity, category_id) VALUES (:title, :discount, :image, :description, :price, :quantity, :category_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function update($data) {
        var_dump($data);
        $sql = "UPDATE products SET title=:title, discount=:discount, image=:image, description=:description, price=:price, quantity=:quantity, category_id=:category_id WHERE product_id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function find_one($id) {
        $sql = "SELECT * FROM products WHERE product_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
