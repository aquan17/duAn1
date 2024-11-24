<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ Khách Hàng</title>
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
        <div class="profile-content">
            <!-- Thông tin cá nhân -->
            <div id="profile">
                <form action="?act=updateProfile&id=<?= $info['user_id'] ?>" method="post" enctype="multipart/form-data">
                    <h2>Thông Tin Cá Nhân</h2>

                    <div class="profile-info">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($info['user_id']) ?>">
                        <label for="name">Họ và tên:</label>
                        <input type="text" class="form-control" name="name" id="name" disabled value="<?= htmlspecialchars($info['username']) ?>">
                    </div>

                    <div class="profile-info">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($info['email']) ?>">
                    </div>

                    <div class="profile-info">
                        <label for="phone">Số điện thoại:</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?= htmlspecialchars($info['phone_number']) ?>">
                    </div>

                    <div class="profile-info">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?= htmlspecialchars($info['address']) ?>">
                    </div>

                    <button class="update-button" name="btn_user">Cập nhật thông tin</button>
                </form>

            </div>

            </form>


        </div>
    </div>
    <?php require_once './views/footer.php' ?>
</body>

</html>