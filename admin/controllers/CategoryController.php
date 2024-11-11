<?php
// controllers/CategoryController.php

require_once 'models/Category.php';

class CategoryController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $category = new Category($this->pdo);
        $categories = $category->all();
        require 'views/category/list.php';
    }

    public function create() {
        require 'views/category/add.php';
    }

    public function store() {
        $data = ['category_name' => $_POST['category_name']];
        $category = new Category($this->pdo);
        $category->insert($data);
        header("Location: index.php?ctl=");
    }

    public function edit($id) {
        $category = new Category($this->pdo);
        $categoryData = $category->find($id);
        require 'views/category/edit.php';
    }

    public function update($id) {
        $data = ['category_name' => $_POST['category_name']];
        $category = new Category($this->pdo);
        $category->update($id, $data);
        header("Location: index.php?ctl=");
    }

    public function delete($id) {
        $category = new Category($this->pdo);
        $category->delete($id);
        header("Location: index.php?ctl=");
    }
}
