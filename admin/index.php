<?php
require_once "../commons/function.php";
require_once "models/Product.php";
require_once "models/Category.php";
require_once "controllers/ProductController.php";
require_once "controllers/CategoryController.php";
require_once "controllers/dashboardController.php";

$ctl = $_GET['ctl'] ?? "";


match("$ctl") {
    ""=> (new dashboardController)->dashboard(),
    "product-list" => (new ProductController())->list(),
    "product-add" => (new ProductController())->add(),
    "product-store" => (new ProductController())->store(),
    "product-edit" => (new ProductController())->edit(),
    "product-delete" => (new ProductController())->delete(),
    
    "category-list" => (new CategoryController())->list(),
    "category-add" => (new CategoryController())->add(),
    "category-store" => (new CategoryController())->store(),
    "category-edit" => (new CategoryController())->edit(),
    "category-delete" => (new CategoryController())->delete(),
    
    default => view('404'),
};
