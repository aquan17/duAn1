<?php
class productModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
    }

    function getAllProduct()
    {
        $sql = "SELECT * FROM product JOIN category ON product.cate_id = category.cate_id ORDER BY product_id DESC";
        return $this->conn->query($sql);
    }

    function insertProduct($name, $img, $price, $detail, $cate, $discount)
    {
        $sql = "INSERT INTO product (product_name, product_img, price, detail, cate_id, discount) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $img, $price, $detail, $cate, $discount]);
    }

    function findProductById($id)
    {
        $sql = "SELECT * FROM product WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function updateProduct($id, $name, $img, $price, $detail, $cate_id, $discount)
    {
        if (empty($img)) {
            $sql = "UPDATE product SET product_name = ?, price = ?, detail = ?, cate_id = ?, discount = ? WHERE product_id = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$name, $price, $detail, $cate_id, $discount, $id]);
        } else {
            $sql = "UPDATE product SET product_name = ?, product_img = ?, price = ?, detail = ?, cate_id = ?, discount = ? WHERE product_id = ?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$name, $img, $price, $detail, $cate_id, $discount, $id]);
        }
    }

    function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
