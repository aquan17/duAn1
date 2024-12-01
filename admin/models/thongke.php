<?php
require_once "../commons/function.php";

class StatisticsModel
{
    public $conn = null;

    // Hàm khởi tạo, kết nối đến cơ sở dữ liệu
    public function __construct() {
        $this->conn = connectDB(); // Sử dụng hàm kết nối từ function.php
    }

    // Hàm lấy dữ liệu thống kê doanh thu và đơn hàng từ bảng statistics
    public function getStatisticsData($start_date, $end_date)
    {
        // Câu truy vấn lấy tổng doanh thu, tổng đơn hàng từ bảng statistics
        $query = "
    SELECT 
        DATE_FORMAT(s.order_date, '%Y-%m-%d') AS date, -- Chuyển ngày thành định dạng yyyy-mm-dd
        SUM(od.quantity) AS quantity,           -- Tổng số lượng
        SUM(s.total_price) AS total_price           -- Tổng doanh thu
    FROM orders s
    JOIN order_details od ON s.order_id = od.order_id
    WHERE s.order_date BETWEEN :start_date AND :end_date -- Lọc theo khoảng thời gian
    GROUP BY s.order_date    -- Nhóm theo ngày
    ORDER BY s.order_date ASC;                            -- Sắp xếp theo ngày
";


        // Khởi tạo mảng dữ liệu kết quả
        $data = [];

        // Thực thi truy vấn
        try {
            // Thực hiện chuẩn bị truy vấn
            $stmt = $this->conn->prepare($query);

            // Thiết lập các tham số: ngày bắt đầu và kết thúc
            $stmt->bindParam(':start_date', $start_date);
            $stmt->bindParam(':end_date', $end_date);

            // Thực thi câu lệnh
            $stmt->execute();

            // Kiểm tra nếu có kết quả
            if ($stmt->rowCount() > 0) {
                // Lấy tất cả các kết quả và lưu vào mảng
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $data = [];
            }
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            $data = [];
        }

        // Trả về dữ liệu thống kê
        return $data;
    }
}
?>
