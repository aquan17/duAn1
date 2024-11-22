<?php
require_once "../commons/function.php"; // Kết nối database

class Order {
    public $conn = null;

    public function __construct() {
        $this->conn = connectDB(); // Hàm kết nối DB (cần xác định hàm connectDB() trong function.php)
    }

    // Phương thức lấy danh sách đơn hàng
    public function listOrder() {
        $sql = "SELECT * from orders where  order_id";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Debug: Kiểm tra dữ liệu trả về
        // var_dump($result);
        return $result;
    }
    public function viewod() {
        $sql = "SELECT products.title,order_details.quantity,order_details.price from products INNER JOIN order_details ON products.product_id = order_details.product_id ";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Debug: Kiểm tra dữ liệu trả về
        // var_dump($result);
        return $result;
    }
    
    
}
?>
