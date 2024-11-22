<?php
require_once 'models/Order.php'; // Đảm bảo yêu cầu model Order

class OrderController {

    private $orderModel; // Biến để chứa đối tượng OrderModel

    // Constructor khởi tạo đối tượng OrderModel
    public function __construct() {
        $this->orderModel = new Order(); // Khởi tạo đối tượng Order từ class Order
    }

    // Phương thức list() để hiển thị đơn hàng
    public function list() {
        // Kiểm tra nếu $orderModel đã được khởi tạo thành công
        if ($this->orderModel) {
            $orders = $this->orderModel->listOrder();  // Gọi phương thức listOrder từ OrderModel

            if ($orders) {
                // Truyền dữ liệu đơn hàng vào view
                require_once 'views/order/listorder.php';
            } else {
                echo "No orders found.";
            }
        } else {
            echo "Error: Order model is not initialized.";
        }
    }
    public function viewsod(){
        if ($this->orderModel) {
            $viewod = $this->orderModel->viewod();  // Gọi phương thức listOrder từ OrderModel

            if ($viewod) {
                // Truyền dữ liệu đơn hàng vào view
                require_once 'views/order/viewsorder.php';
            } else {
                echo "No orders found.";
            }
        } else {
            echo "Error: Order model is not initialized.";
        }
    }
}
?>
