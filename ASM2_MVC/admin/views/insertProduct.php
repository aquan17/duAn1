<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
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
    <section id="content">
        <div class="container">
            <h1>Form Thêm sản phẩm</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" id="name" class="form-control" name="name">
                </div>
                <div class="">
                    <label for="img">Hình ảnh</label><br>
                    <input type="file" name="img" id="img" class="">
                </div>
                <div class="form-group">
                    <label for="price">Giá sản phẩm</label>
                    <input type="text" id="price" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="detail">Chi tiết sản phẩm</label>
                    <input type="text" id="detail" name="detail" class="form-control">
                </div>
                <div class="form-group">
                    <label for="status">Danh Mục sản phẩm</label><br>
                    <select name="cate" id="" class="form-control">
                        <option value="1">Đồ ăn vặt</option>
                        <option value="2">Đồ uống</option>
                        <option value="3">Kem xôi</option>
                    </select> <br>
                </div>
                <div class="form-group">
                    <label for="discount">Giảm giá</label>
                    <input type="text" id="discount" name="discount" class="form-control">
                </div>
                <button class="btn btn-success" name="btn_insert">Thêm sản phẩm</button>
            </form>
        </div>
    </section>
</body>

</html>
