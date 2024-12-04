<?php
require_once 'models/dashboard.php';

class dashboardController
{
    private $dashboard;

    public function __construct()
    {
        $this->dashboard = new dashboard(); // Khởi tạo model dashboard
    }

    public function dashboard()
    {
        // Lấy danh sách đơn hàng từ model
        $get = $this->dashboard->getOrders();
// var_dump($get);  // In ra dữ liệu để kiểm tra
require_once 'views/dashboard.php';


        // Gọi view dashboard và truyền dữ liệu
        require_once 'views/dashboard.php'; // Make sure 'dashboard.php' handles `$orders` properly
    }
}
