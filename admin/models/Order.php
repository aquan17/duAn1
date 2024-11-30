<?php
// models/Order.php
require_once "../commons/function.php"; // Kết nối cơ sở dữ liệu

class Order
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy danh sách đơn hàng
    public function listOrders()
    {
        $sql = "SELECT * FROM orders";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết đơn hàng
    // models/Order.php
    public function getOrderDetails($orderId)
    {
        $sql = "
        SELECT 
            products.title AS product_name, 
            order_details.quantity, 
            order_details.price, 
            order_details.order_code,  -- Đảm bảo truy vấn lấy trường 'order_code'
            (order_details.price * order_details.quantity) AS total_money
        FROM order_details
        INNER JOIN products ON products.product_id = order_details.product_id
        WHERE order_details.order_id = :order_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Cập nhật trạng thái đơn hàng
    public function updateOrderStatus($orderId, $status)
    {
        $sql = "UPDATE orders SET status = :status WHERE order_id = :order_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['status' => $status, 'order_id' => $orderId]);
    }
}
