<?php
class categoryModel
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
    }

    function getAllCategories()
    {
        $sql = "SELECT * FROM category ORDER BY cate_id DESC";
        return $this->conn->query($sql);
    }

    function insertCategory($name)
    {
        $sql = "INSERT INTO category (cate_name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name]);
    }

    function findCategoryById($id)
    {
        $sql = "SELECT * FROM category WHERE cate_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function updateCategory($id, $name)
    {
        $sql = "UPDATE category SET cate_name = ? WHERE cate_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $id]);
    }

    function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE cate_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
