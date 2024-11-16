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
        table th {
            padding: 10px 20px;
            color: darkgreen;
            font-weight: bolder;
        }

        table {
            background-color: gainsboro;
            font-family: Arial, Helvetica, sans-serif;
        }

        table td {
            padding: 10px 15px;
            text-align: center;
        }

        table button {
            padding: 5px 10px;
            border-radius: 5px;
            border: 1px #ccc solid;
            font-size: 0.7vw;
        }

        table img {
            width: 5vw;
            height: 5vw;
        }

        .checkborder {
            border: 1px solid #ccc;
            margin-top: 15px;
            padding: 5px 10px;
            border-radius: 5px;
        }


        input[type="text"],
        textarea,
        select,
        input[type=date],
        input[type=file],
        input[type=password],
        input[type=email],
        input[type="search"],
        input[type="number"] {
            width: 100%;
            padding: 5px 15px;
            border-radius: 5px;
            font-size: 1vw;
            border: 1px #ccc solid;
        }


        input:disabled {
            background-color: #eee;
            border-color: #ccc;
        }

        input[type="submit"],
        input[type="reset"],
        input[type="button"] {
            padding: 10px 10px;
            border-radius: 5px;
            border: 1px #ccc solid;
            font-size: 0.7vw;
            margin: 20px 0px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover,
        input[type="button"]:hover,
        button:hover {
            background-color: aqua;
        }
    </style>
</head>

<body>
    <?php require_once 'views/components/navbar.php'; ?>
    <br>
    <section id="content" style="margin-left: 10px;">
    <h2>Danh sách danh mục</h2>
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