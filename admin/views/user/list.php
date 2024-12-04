<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/a.css">
    <style>
        .table-wrapper {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .table th {
            background-color: #0d6efd;
            color: #fff;
        }
        .table td {
            vertical-align: middle;
        }
        .btn-action {
            font-size: 0.9rem;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <!-- Gọi Navbar -->
    <?php require_once 'views/components/navbar.php'; ?>


    <!-- Content -->
    <section id="content">
        <!-- User List -->
        <main class="container mt-4">
            <div class="table-wrapper">
                <h2 class="mb-4">Danh sách người dùng</h2>
                <table class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Chức vụ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($users) && !empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $user['user_id'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['phone_number'] ?></td>
                                    <td><?= $user['address'] ?></td>
                                    <td>
                        <?php 
                            // Hiển thị chức vụ thay vì role_id
                            if ($user['role_id'] == 1) {
                                echo 'Admin';
                            } elseif ($user['role_id'] == 2) {
                                echo 'User';
                            } else {
                                echo 'Chưa xác định';
                            }
                        ?>
                    </td>
                                    <td>
                                        <a href="index.php?ctl=user-edit&id=<?= $user['user_id'] ?>" 
                                           class="btn btn-warning btn-sm btn-action">Sửa</a>
                                        <a href="index.php?ctl=user-delete&id=<?= $user['user_id'] ?>" 
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')" 
                                           class="btn btn-danger btn-sm btn-action">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">Không có người dùng nào.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>