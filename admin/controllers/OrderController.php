<?php
require_once 'models/Order.php';

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new Order();
    }

    // Hiển thị danh sách đơn hàng
    public function listOrders() {
        $orders = $this->orderModel->listOrders();
        require_once 'views/order/listorder.php';
    }

    // Hiển thị chi tiết đơn hàng
    public function viewOrderDetails() {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];
            $orderDetails = $this->orderModel->getOrderDetails($orderId);
            require_once 'views/order/viewsorder.php';
        } else {
            echo "Không tìm thấy mã đơn hàng.";
        }
    }
}
?>
