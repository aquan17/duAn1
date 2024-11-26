<?php
require_once "../commons/function.php"; // Kết nối cơ sở dữ liệu

class Order {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy danh sách đơn hàng
    public function listOrders() {
        $sql = "SELECT * FROM orders";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết sản phẩm của một đơn hàng
    public function getOrderDetails($orderId) {
        $sql = "
            SELECT 
                products.title AS product_name, 
                order_details.quantity, 
                order_details.price, 
                (order_details.price * order_details.quantity) AS total_money
            FROM order_details
            INNER JOIN products ON products.product_id = order_details.product_id
            WHERE order_details.order_id = :order_id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
