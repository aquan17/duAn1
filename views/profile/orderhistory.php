<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Đặt Hàng</title>
    <link rel="stylesheet" href="./assets/css/profile.css">
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
        <!-- Lịch sử đơn hàng -->
        <div class="profile-content">
        <div id="order-history" class="order-history-section">
            <h2>Lịch Sử Đơn Hàng</h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Số Lượng</th>
                        <th>Ngày Đặt</th>
                        <th>Trạng Thái</th>
                        <th>Tổng Tiền</th>
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
                            <td><?= ($history['status'] == 1) ? 'Đang xử lý' : ($history['status'] == 2 ? 'Đã xác nhận' : 'Chưa xác nhận'); ?></td>
                            <td><?php $total = $history['price'] * $history['quantity'];
                                $_SESSION['sum_price'] += $total;
                                echo number_format($total) . 'đ'; ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="color: red; background-color: yellow;">Tổng Tiền: <?= number_format($_SESSION['sum_price']) . 'đ'   ?></th>
                        </tr>

                    <?php  } ?>
                </tbody>
            </table>
        </div>
        </div>


    </div>
    </div>
    <?php require_once './views/footer.php' ?>
</body>

</html>