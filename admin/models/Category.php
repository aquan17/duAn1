<?php
require_once "../commons/function.php";

class Category {
    public $conn = null;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function all() {
        $sql = "SELECT * FROM categories WHERE category_id != 6 ORDER BY category_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cập nhật phương thức delete để thực hiện xóa mềm
    public function delete($id) {
        try {
            // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
            $this->conn->beginTransaction();

            // Cập nhật các sản phẩm về danh mục "không xác định" (ID = 6)
            $sqlUpdateProducts = "UPDATE products SET category_id = 6 WHERE category_id = :id";
            $stmt = $this->conn->prepare($sqlUpdateProducts);
            $stmt->execute(['id' => $id]);

            // Xóa danh mục khỏi bảng categories
            $sqlDeleteCategory = "DELETE FROM categories WHERE category_id = :id";
            $stmt = $this->conn->prepare($sqlDeleteCategory);
            $stmt->execute(['id' => $id]);

            // Commit transaction
            $this->conn->commit();
        } catch (Exception $e) {
            // Rollback nếu có lỗi
            $this->conn->rollBack();
            throw $e;
        }
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
