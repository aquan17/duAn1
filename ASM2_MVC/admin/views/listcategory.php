<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/a.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php require_once 'views/components/navbar.php'; ?>
    <br>
    <section id="content" style="margin-left: 20px;" >
        <p><a href="?act=insertcategory"><button class="btn btn-primary">Thêm sản phẩm</button></a></p>
        <tr class="1">
            <table cellspacing="0" class="table">
                <td>ID</td>
                <td>Danh Mục Sản Phẩm</td>
                <td>Sửa</td>
                <td>Xóa</td>
        </tr> <?php
                foreach ($allCategories as $key => $rows) {
                ?>
            <tr>
                <td><?= $rows['cate_id'] ?></td>
                <td><?= $rows['cate_name'] ?></td>
                <td><a href="?act=updatecategory&id=<?= $rows['cate_id'] ?>"><button class="btn btn-info">Sửa</button></a></td>
                <td><a onclick="return confirm('Bạn có muốn xoá sinh viên này không');" href="?act=deletecategory&id=<?= $rows['cate_id'] ?>"><button class="btn btn-danger">Xóa</button></a></td>
            </tr>
        <?php } ?>
    </section>
    
</body>

</html>