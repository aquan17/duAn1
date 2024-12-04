<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> 
    <!-- My CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* CSS styling remains unchanged */
    </style>
</head>

<body>
    <?php require_once 'views/components/navbar.php'; ?>
    <br>
    <section id="content" style="margin-left: 10px;">
    <h2>Danh sách danh mục</h2>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <a href="index.php?ctl=category-add"><button class="btn btn-primary">Thêm Danh Mục</button></a>
    <table class="table table-striped table-bordered">
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category['category_id'] ?></td>
            <td><?= $category['category_name'] ?></td>
            <td>
                <a href="index.php?ctl=category-edit&id=<?= $category['category_id'] ?>"><button class="btn btn-warning">Sửa</button></a>
                <a href="index.php?ctl=category-delete&id=<?= $category['category_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><button class="btn btn-danger">Xóa</button></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </section>
</body>

</html>
