<?php
// Controller: AdminController.php
require_once "models/thongke.php";
require_once '../carbon/autoload.php'; // Nếu sử dụng Composer để cài đặt Carbon
use Carbon\Carbon;

class thongkeController
{
    public function thongke()
    {
        // Lấy ngày bắt đầu và kết thúc từ GET (nếu có)
        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString(); // mặc định 7 ngày trước
        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); // mặc định hôm nay

        // Gọi model để lấy dữ liệu thống kê
        $statisticsModel = new StatisticsModel();
        $statistics = $statisticsModel->getStatisticsData($start_date, $end_date);

        // Truyền dữ liệu sang view
        require_once 'views/thongke.php';
    }
}
?>
