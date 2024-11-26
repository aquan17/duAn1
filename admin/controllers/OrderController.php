<?php
// controllers/OrderController.php
require_once 'models/Order.php';

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new Order();
    }

    // Hiển thị danh sách đơn hàng
    public function listOrders() {
        $orders = $this->orderModel->listOrders();
        require_once 'views/order/listorder.php';  // Gọi view để hiển thị đơn hàng
    }

    // Hiển thị chi tiết đơn hàng
    public function viewOrderDetails() {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];
            $orderDetails = $this->orderModel->getOrderDetails($orderId);
            require_once 'views/order/viewsorder.php';  // Gọi view chi tiết đơn hàng
        } else {
            echo "Không tìm thấy mã đơn hàng.";
        }
    }

    // Cập nhật trạng thái đơn hàng
    public function updateOrderStatus() {
        if (isset($_POST['order_id']) && isset($_POST['status'])) {
            $orderId = $_POST['order_id'];
            $status = $_POST['status'];
            $this->orderModel->updateOrderStatus($orderId, $status);
            header("Location: index.php?ctl=order");  // Chuyển hướng lại trang danh sách đơn hàng
        }
    }
}

?>
