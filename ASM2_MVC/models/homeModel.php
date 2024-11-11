<?php
class homeModel{
    public $conn;
    function __construct(){
        $this->conn = connectDB();
    }

    function allProduct() {
        $sql = "SELECT * FROM product ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }

    function Product() {
        $sql = "SELECT * FROM product ORDER BY product_id ASC LIMIT 6";
        return $this->conn->query($sql);
    }

    function findProductById($id){
        $sql = "SELECT * FROM product WHERE product_id = $id";
        return $this->conn->query($sql)->fetch();
    }

    function getSnacks() {
        $sql = "SELECT * FROM product WHERE cate_id = 1 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }

    function getDrinks() {
        $sql = "SELECT * FROM product WHERE cate_id = 2 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }
    function cream() {
        $sql = "SELECT * FROM product WHERE cate_id = 3 ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }

    function getRelatedProducts($id) {
        $sql = "SELECT * FROM product WHERE product_id != $id LIMIT 2";  // Lấy 2 sản phẩm liên quan không bao gồm sản phẩm hiện tại
        return $this->conn->query($sql);
    }

    function getRandomProducts($excludeId) {
    $sql = "SELECT * FROM product WHERE cate_id IN (1,2, 3) AND product_id != $excludeId ORDER BY RAND() LIMIT 3";
    // Lấy 3 sản phẩm ngẫu nhiên từ danh mục 2 hoặc 3, không bao gồm sản phẩm hiện tại
    return $this->conn->query($sql)->fetchAll();
}

}
?>
