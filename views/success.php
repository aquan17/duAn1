<?php
session_start();

// Kiểm tra xem có thông tin đơn hàng trong session hay không
if (isset($_SESSION['order_info'])) {
    $order_info = $_SESSION['order_info']; // Lấy thông tin đơn hàng từ session
    // unset($_SESSION['order_info']); // Xóa thông tin đơn hàng sau khi hiển thị
} else {
    // Nếu không có thông tin đơn hàng trong session, chuyển hướng về trang chủ
    // header("Location: ?act=shop");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Simple styles for confirmation page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
            text-align: center;
        }

        .order-details {
            margin-top: 20px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-details th,
        .order-details td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .order-details th {
            background-color: #f4f4f4;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Your Order Has Been Successfully Placed!</h1>

        <p>Thank you for your purchase! We will process your order shortly.</p>

        <!-- Hiển thị thông tin đơn hàng -->
        <div class="order-details">
            <h2>Order Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($order_info['items'] as $item):
                        $total_money = $item['price'] * $item['quantity']; // Calculate total for each item inside the loop
                        $total += $total_money;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['title']); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo number_format($total_money); ?>đ</td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table><br>

            <div class="total">
                Total: <?php echo number_format($total); ?>đ
            </div>

        </div>

        <!-- Link quay lại trang chủ -->
        <div class="back-link">
            <a href="../?act=shop">Back to Home</a>
        </div>
    </div>

</body>

</html>