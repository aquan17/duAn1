<?php


require_once "../commons/function.php";
require_once "models/Category.php";
require_once "controllers/CategoryController.php";

// Tạo kết nối PDO bằng hàm connectDB()
$pdo = connectDB(); // Gọi hàm connectDB để lấy kết nối PDO

$ctl = $_GET['ctl'] ?? "";

match($ctl) {
    "" => (new CategoryController($pdo))->index(),
    "delete" => (new CategoryController($pdo))->delete($_GET['id'] ?? 0),
    "add" => (new CategoryController($pdo))->create(),
    "store" => (new CategoryController($pdo))->store(),
    "edit" => (new CategoryController($pdo))->edit($_GET['id'] ?? 0),
    "update" => (new CategoryController($pdo))->update($_GET['id'] ?? 0),
    
};
