<?php
// models/Category.php

class Category {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE category_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->pdo->prepare("INSERT INTO categories (category_name) VALUES (:category_name)");
        $stmt->execute(['category_name' => $data['category_name']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE categories SET category_name = :category_name WHERE category_id = :id");
        $stmt->execute(['category_name' => $data['category_name'], 'id' => $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE category_id = ?");
        $stmt->execute([$id]);
    }
}
