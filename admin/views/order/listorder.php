<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php require_once 'views/components/navbar.php'; ?>
    <br>
    <section id="content" style="margin-left: 10px;">
        <h2>Danh sách Đơn Hàng</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Đơn Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Tình Trạng</th>
                    <th>Ngày Đặt</th>
                    <th>Quản Lý</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                $i = 1;
                foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $i++  ;?></td>
                        <td><?php echo $order['first_name']; ?></td>
                        <td><?php echo $order['address']; ?></td>
                        <td><?php echo $order['email']; ?></td>
                        <td><?php echo $order['phone']; ?></td>
                        <td><?php echo ($order['status'] == 1) ? 'Đang xử lý' : ($order['status'] == 2 ? 'Đã xác nhận' : 'Chưa xác nhận'); ?></td>

                        <td><?php echo $order['order_date']; ?></td>
                        <td><a href="?ctl=viewod"><button class="btn btn-info">Xem Đơn Hàng</button></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

</body>
</html>
