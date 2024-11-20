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
        <h2>Chi Tiết Đơn Hàng</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Đơn Hàng</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Thành Tiền</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                $i = 1;
                $_SESSION['sum_price'] = 0; 
                
                foreach ($viewod as $order): ?>
                    <tr>
                        <td><?php echo $i++  ;?></td>
                        <td><?php echo $order['title']; ?></td>
                        <td><?php echo number_format($order['price']).'đ'; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php $total = $order['price'] * $order['quantity'];
                        $_SESSION['sum_price'] += $total;
                        echo number_format($total).'đ'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tr>
                <th style="color: red;">Tổng Tiền: <?= number_format($_SESSION['sum_price']).'đ'   ?></th>
            </tr>
        </table>
    </section>

</body>
</html>
