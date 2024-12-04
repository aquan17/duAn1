<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Đặt Hàng</title>
    <link rel="stylesheet" href="./assets/css/profile.css">
    <style>
        .alert {
    padding: 15px;
    margin: 10px 0;
    border-radius: 5px;
    font-size: 16px;
}

.alert-info {
    background-color: #d9edf7;
    border-color: #bce8f1;
    color: #31708f;
}

    </style>
</head>

<body>
    <?php require_once './views/menu.php' ?>
    <div class="profile-wrapper">
        <!-- Thanh menu bên trái -->
        <div class="profile-menu">
            <h2>Hồ Sơ Khách Hàng</h2>
            <ul>
                <li><a href="?act=profile">Thông Tin Cá Nhân</a></li>
                <li><a href="?act=history">Lịch Sử Đơn Hàng</a></li>
            </ul>
        </div>

        <!-- Nội dung chính -->
        <div class="profile-content">
            <div id="order-history" class="order-history-section">
                <h2>Lịch Sử Đơn Hàng</h2>

                <!-- Hiển thị thông báo nếu có -->
                <?php
// Kiểm tra và hiển thị thông báo từ session
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
    // Xóa thông báo sau khi hiển thị để tránh hiển thị lại khi tải lại trang
    unset($_SESSION['message']);
}
?>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Số Lượng</th>
                            <th>Ngày Đặt</th>
                            <th>Trạng Thái</th>
                            <th>Tổng Tiền</th>
                            <th>Thao Tác</th> <!-- Thêm cột thao tác -->
                        </tr>
                    </thead>
                    <tbody>
    <?php
    $i = 1;
    $_SESSION['sum_price'] = 0;
    foreach ($odhistory as $history) { ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $history['title'] ?></td>
            <td><img src="./assets/images/product/<?= $history['image'] ?>" alt="" width="100px"></td>
            <td><?= $history['quantity'] ?></td>
            <td><?= $history['order_date'] ?></td>
            <td>
                <?= $history['status'] == 1
                    ? '<span class="badge badge-success">Đã xử lý</span>'
                    : ($history['status'] == 2
                        ? '<span class="badge badge-warning text-dark">Đang xử lý</span>'
                        : ($history['status'] == 3
                            ? '<span class="badge badge-danger">Đã Hủy</span>'
                            : ($history['status'] == 4
                                ? '<span class="badge badge-primary">Đã giao</span>'
                                : ($history['status'] == 5
                                    ? '<span class="badge badge-info">Đang giao</span>'
                                    : '<span class="badge badge-secondary">Chưa xử lý</span>' 
                                )
                            )
                        )
                    );
                ?>
            </td>
            <td><?php 
                // Chỉ tính tiền khi đơn hàng không bị hủy
                if ($history['status'] != 3) {
                    $total = $history['price'] * $history['quantity'];
                    $_SESSION['sum_price'] += $total;
                    echo number_format($total) . 'đ'; 
                } else {
                    echo 'Đã hủy';
                }
                ?></td>
            <td>
                <!-- Chỉ hiển thị nút hủy khi trạng thái là "Chưa xử lý" -->
                <?php if (!in_array($history['status'], [1, 2, 3, 4, 5])) { ?>
                    <a href="?act=cancelOrder&order_id=<?= $history['order_id'] ?>" class="btn btn-danger">Hủy Đơn</a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <th style="color: red; background-color: yellow;" colspan="6">Tổng Tiền: <?= number_format($_SESSION['sum_price']) . 'đ' ?></th>
    </tr>
</tbody>

                </table>
            </div>
        </div>
    </div>
    <?php require_once './views/footer.php' ?>
</body>

</html>
