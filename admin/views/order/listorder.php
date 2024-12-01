<!-- views/order/listorder.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Các kiểu định dạng */
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-x: auto;
        }

        .table th {
            background-color: #0d6efd;
            color: white;
            text-align: center;
            font-weight: bold;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 12px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f1f1f1;
        }

        .badge {
            font-size: 0.9rem;
        }

        .btn {
            padding: 6px 12px;
            font-size: 0.9rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-sm {
            padding: 5px 10px;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .text-center {
            text-align: center;
        }

        .text-danger {
            font-size: 1rem;
            font-weight: bold;
            color: #dc3545;
        }

        .table-container {
            max-width: 100%;
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <?php require_once 'views/components/navbar.php'; ?>

    <!-- Nội dung -->
    <section id="content">
        <div class="container-fluid">
            <h2>Danh sách đơn hàng</h2>
            <div class="table-container">
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
                            <th>Xử Lý Đơn Hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['order_id']; ?></td>
                                <td><?php echo $order['full_name']; ?></td>
                                <td><?php echo $order['address']; ?></td>
                                <td><?php echo $order['email']; ?></td>
                                <td><?php echo $order['phone']; ?></td>
                                <td>
                                    <?= $order['status'] == 1
                                        ? '<span class="badge badge-success">Đã xử lý</span>'
                                        : ($order['status'] == 2
                                            ? '<span class="badge badge-warning text-dark">Đang xử lý</span>'
                                            : '<span class="badge badge-secondary">Chưa xử lý</span>'
                                        ); ?>
                                </td>
                                <td><?php echo $order['order_date']; ?></td>
                                <td>
                                    <a href="index.php?ctl=viewod&order_id=<?= $order['order_id']; ?>" class="btn btn-primary btn-sm">Xem chi tiết</a>
                                </td>
                                <td>
                                    <form action="index.php?ctl=updateStatus" method="POST">
                                        <input type="hidden" name="order_id" value="<?= $order['order_id']; ?>">
                                        <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                            <option value="1" <?= $order['status'] == 1 ? 'selected' : ''; ?>>Đã xử lý</option>
                                            <option value="2" <?= $order['status'] == 2 ? 'selected' : ''; ?>>Đang xử lý</option>
                                            <option value="3" <?= $order['status'] == 3 ? 'selected' : ''; ?>>Hủy Đơn</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
