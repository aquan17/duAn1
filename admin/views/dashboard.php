<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Thống kê doanh thu</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/a.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>
    <?php require_once 'views/components/navbar.php'; ?>

    <section id="content">
        <main>
            <!-- Form để chọn khoảng thời gian -->
            <form action="?ctl=/" method="get">
                <label for="start_date">Ngày bắt đầu:</label>
                <input type="date" id="start_date" name="start_date" value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d', strtotime('-7 days')) ?>" required>
                
                <label for="end_date">Ngày kết thúc:</label>
                <input type="date" id="end_date" name="end_date" value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d') ?>" required>
                
                <button type="submit">Lọc</button>
            </form>

            <p>Thống kê đơn hàng từ: <span id="text-date"></span></p>
            <div id="myfirstchart" style="height: 250px;"></div>
        </main>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(document).ready(function(){
            // Dữ liệu thống kê được truyền từ controller sang view dưới dạng JSON
            var statisticsData = <?php echo json_encode($statistics); ?>;

            // Khởi tạo Morris.Area chart
            var chart = new Morris.Area({
                element: 'myfirstchart',
                xkey: 'date',
                ykeys: ['quantity', 'total_price'],
                labels: ['Tổng Đơn Hàng', 'Doanh Thu'],
                lineColors: ['#0b62a4', '#4da74d'],
                pointSize: 5,
                hideHover: 'auto',
                parseTime: false
            });

            // Cập nhật dữ liệu cho biểu đồ
            chart.setData(statisticsData);

            // Hiển thị ngày thống kê
            var startDate = statisticsData[0] ? statisticsData[0].date : 'N/A';
            var endDate = statisticsData[statisticsData.length - 1] ? statisticsData[statisticsData.length - 1].date : 'N/A';
            $('#text-date').text(startDate + ' đến ' + endDate);
        });
    </script>
</body>

</html>
