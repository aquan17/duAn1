<?php
session_start();

// Kiểm tra xem có thông tin đơn hàng trong session hay không
if (isset($_SESSION['order_info'])) {
    $order_info = $_SESSION['order_info']; // Lấy thông tin đơn hàng từ session
    unset($_SESSION['order_info']); // Xóa thông tin đơn hàng sau khi hiển thị
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h1>Your Order Has Been Successfully Placed!</h1>

        <p>Thank you for your purchase! We will process your order shortly.</p>

        <!-- Hiển thị thông tin đơn hàng -->
        

</body>
</html>
