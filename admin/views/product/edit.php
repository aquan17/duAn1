<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Sản Phẩm</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* CSS chung */
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        section {
            margin: 20px;
        }

        h2 {
            color: darkgreen;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form chỉnh sửa sản phẩm */
        form {
            background-color: gainsboro;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: darkgreen;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="file"],
        form textarea,
        form select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        form textarea {
            resize: vertical;
            min-height: 80px;
        }

        form img {
            display: block;
            margin-top: 10px;
            max-width: 50px;
            max-height: 50px;
        }

        form button {
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: darkgreen;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: aqua;
            color: black;
        }
    </style>
</head>

<body>
    <section id="content">
        <h2>Chỉnh sửa sản phẩm</h2>
        <form action="index.php?ctl=product-edit&id=<?= $product['product_id'] ?>" method="POST" enctype="multipart/form-data">
            <label for="title">Tiêu đề:</label>
            <input type="text" id="title" name="title" value="<?= $product['title'] ?>" required>

            <label for="discount">Giảm giá:</label>
            <input type="number" id="discount" name="discount" value="<?= $product['discount'] ?>">

            <label for="image">Hình ảnh:</label>
            <input type="file" id="image" name="image">
            <img src="../assets/images/product/<?= $product['image'] ?>" alt="Hình sản phẩm">
            <!-- Trường ẩn để gửi ảnh cũ -->
            <input type="hidden" name="old_image" value="<?= $product['image'] ?>">

            <label for="description">Mô tả:</label>
            <textarea id="description" name="description"><?= $product['description'] ?></textarea>

            <label for="price">Giá:</label>
            <input type="number" id="price" name="price" value="<?= $product['price'] ?>" required>

            <label for="quantity">Số lượng:</label>
            <input type="number" id="quantity" name="quantity" value="<?= $product['quantity'] ?>">

            <label for="category_id">Danh Mục:</label>
            <select id="category_id" name="category_id" required>
                <option value="">-- Chọn Danh Mục --</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category_id']; ?>" <?= $category['category_id'] == $product['category_id'] ? 'selected' : '' ?>>
                        <?= $category['category_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Lưu</button>
        </form>
    </section>
</body>

</html>
