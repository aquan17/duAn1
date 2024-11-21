<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Người Dùng</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- CSS Tùy Chỉnh -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        h1 {
            margin-bottom: 30px;
            color: #007bff;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: #495057;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .form-text {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="form-container">
        <h1 class="text-center">Sửa thông tin người dùng</h1>

        <!-- Form -->
        <form action="index.php?ctl=user-edit&id=<?php echo $user['user_id']; ?>" method="POST">

            <div class="row">
                <!-- Tên người dùng -->
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Tên người dùng:</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>

                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
            </div>

            <div class="row">
                <!-- Số điện thoại -->
                <div class="col-md-6 mb-3">
                    <label for="phone_number" class="form-label">Số điện thoại:</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo htmlspecialchars($user['phone_number']); ?>" required>
                </div>

                <!-- Địa chỉ -->
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Địa chỉ:</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?php echo htmlspecialchars($user['address']); ?>" required>
                </div>
            </div>

            <!-- Mật khẩu mới -->
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu mới:</label>
                <input type="password" name="password" id="password" class="form-control">
                <small class="form-text">Để trống nếu không muốn thay đổi mật khẩu.</small>
            </div>

            <!-- Quyền -->
            <div class="mb-3">
                <label for="role_id" class="form-label">Quyền:</label>
                <select name="role_id" id="role_id" class="form-select" required>
                    <option value="1" <?php echo $user['role_id'] == 1 ? 'selected' : ''; ?>>Admin</option>
                    <option value="2" <?php echo $user['role_id'] == 2 ? 'selected' : ''; ?>>User</option>
                </select>
            </div>

            <!-- Nút cập nhật -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS (Tùy chọn nhưng hữu ích cho tính năng như dropdown, modal, ...) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
