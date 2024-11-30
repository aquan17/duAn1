<?php
// Lấy các tham số từ URL
$partnerCode = $_GET['partnerCode'];
$orderId = $_GET['orderId'];
$requestId = $_GET['requestId'];
$amount = $_GET['amount'];
$orderInfo = urldecode($_GET['orderInfo']);
$orderType = $_GET['orderType'];
$transId = $_GET['transId'];
$resultCode = $_GET['resultCode'];
$message = $_GET['message'];
$payType = $_GET['payType'];
$responseTime = $_GET['responseTime'];
$extraData = $_GET['extraData'];
$signature = $_GET['signature'];

// Kiểm tra mã kết quả (resultCode) để hiển thị thông báo thành công
if ($resultCode == 0) {
    $statusMessage = "Thanh toán thành công!";
    $colorClass = "success"; // CSS class cho thông báo thành công
} else {
    $statusMessage = "Thanh toán không thành công! Lỗi: " . $message;
    $colorClass = "error"; // CSS class cho thông báo lỗi
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Thanh Toán Thành Công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }

        .notification {
            margin: 20px 0;
            padding: 15px;
            border-radius: 5px;
            font-size: 18px;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .order-info {
            margin: 20px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .order-info p {
            margin: 10px 0;
            font-size: 16px;
        }

        .contact-info {
            margin-top: 30px;
            text-align: center;
            font-size: 16px;
        }

        .contact-info a {
            color: #007bff;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
            color: #666;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thanh Toán Thành Công!</h1>
            <p>Cảm ơn bạn đã mua hàng tại <strong>[Tên cửa hàng]</strong>!</p>
        </div>

        <div class="notification <?php echo $colorClass; ?>">
            <p><?php echo $statusMessage; ?></p>
        </div>

        <div class="order-info">
            <h3>Thông tin đơn hàng:</h3>
            <p><strong>Mã đơn hàng:</strong> <?php echo $orderId; ?></p>
            <p><strong>Ngày đặt hàng:</strong> <?php echo date('d/m/Y H:i:s'); ?></p>
            <p><strong>Số tiền:</strong> <?php echo number_format($amount); ?> VND</p>
            <p><strong>Thông tin đơn hàng:</strong> <?php echo $orderInfo; ?></p>
            <p><strong>Phương thức thanh toán:</strong> <?php echo $payType; ?></p>
        </div>

        <div class="contact-info">
            <p>Chúng tôi sẽ gửi email thông báo chi tiết về trạng thái đơn hàng và thông tin vận chuyển tới bạn trong thời gian tới.</p>
            <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email <a href="mailto:support@example.com">support@example.com</a> hoặc gọi đến số điện thoại <a href="tel:+1234567890">+123 456 7890</a>.</p>
        </div>

        <div class="footer">
            <p>Chúc bạn một ngày tuyệt vời!</p>
            <p><strong>[Tên cửa hàng]</strong></p>
        </div>
    </div>
</body>
</html>
