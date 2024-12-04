<?php
require_once "../commons/function.php"; // Kết nối cơ sở dữ liệu

class dashboard
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Hàm kết nối CSDL từ `function.php`
    }

    // Lấy danh sách đơn hàng
    public function getOrders()
    {
        try {
            $sql = "SELECT full_name, status, order_date FROM orders";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách đơn hàng
        } catch (PDOException $e) {
            // Log the error or handle it as needed
            return []; // Return an empty array if there is an error
        }
    }
}
