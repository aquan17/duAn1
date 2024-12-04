<?php
$total = 0; // Khởi tạo tổng tiền là 0
foreach ($orderDetails as $item) {
    $total += $item['total_money']; // Cộng dồn tiền vào tổng
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 30px;
            color: white;
        }

        .sidebar a {
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #0d6efd;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: calc(100% - 260px);
        }

        .table {
            width: 100%;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
            overflow-x: auto;
        }

        .table thead {
            background-color: #0d6efd;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 12px;
        }

        .table th {
            font-weight: bold;
        }

        .text-danger {
            font-size: 1.2rem;
            font-weight: bold;
            color: #dc3545;
        }
    </style>
</head>

<body>
    <?php require_once 'views/components/navbar.php'; ?>

    <div class="content">
        <h2 class="mb-4">Chi tiết đơn hàng</h2>
        <div style="margin-left: 10px;">
       <?php if (!empty($orderDetails)): ?>
    <p><strong>Tên khách hàng:</strong> <?= $orderDetails[0]['full_name'] ?></p>
    <p><strong>Địa chỉ:</strong> <?= $orderDetails[0]['address'] ?></p>
    <p><strong>Email:</strong> <?= $orderDetails[0]['email'] ?></p>
    <p><strong>Số điện thoại:</strong> <?= $orderDetails[0]['phone'] ?></p>
    <p><strong>Ngày đặt:</strong> <?= $orderDetails[0]['order_date'] ?></p>
<?php else: ?>
    <p>Không có dữ liệu đơn hàng.</p>
<?php endif; ?>
</div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderDetails as $item): ?>
                    <tr>
                        <td><?= $item['order_code'] ?></td>
                        <td><?= $item['product_name'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                        <td><?= number_format($item['total_money'], 0, ',', '.') ?> VND</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="4" class="text-end text-danger">Tổng tiền:</th>
                    <th class="text-danger"><?= number_format($total, 0, ',', '.') ?> VND</th>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>