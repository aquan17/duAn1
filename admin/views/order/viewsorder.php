<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tổng thể */
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

        /* Sidebar */
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

        /* Nội dung chính */
        .content {
            margin-left: 260px; /* Để phần nội dung không bị che khuất bởi sidebar */
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: calc(100% - 260px);
        }

        /* Bảng chi tiết */
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

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 12px;
        }

        .table th {
            font-weight: bold;
        }

        /* Tổng tiền */
        .text-danger {
            font-size: 1.2rem;
            font-weight: bold;
            color: #dc3545;
        }

        /* Hiển thị mã đơn hàng */
        .order-code {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Sidebar (Navbar bên trái) -->
    <?php require_once 'views/components/navbar.php'; ?>

    <!-- Nội dung -->
    <div class="content">
        <h2 class="mb-4">Chi tiết đơn hàng</h2>
        
        <!-- Hiển thị Mã Đơn Hàng -->
       

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
                <?php 
                $total = 0; 
                foreach ($orderDetails as $item): 
                    $total += $item['total_money']; 
                ?>
                    <tr>
                        <td><?= $item['order_code']; ?></td>
                        <td><?= $item['product_name']; ?></td>
                        <td><?= $item['quantity']; ?></td>
                        <td><?= number_format($item['price']) . 'đ'; ?></td>
                        <td><?= number_format($item['total_money']) . 'đ'; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="3" class="text-end text-danger">Tổng tiền:</th>
                    <th class="text-danger"><?= number_format($total) . 'đ'; ?></th>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
