
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Danh Mục</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
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

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 1rem;
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
        <h2>Chỉnh sửa danh mục</h2>
        <form action="index.php?ctl=category-edit&id=<?= $category['category_id'] ?>" method="POST">
            <label for="category_name">Tên danh mục:</label>
            <input type="text" id="category_name" name="category_name" value="<?= $category['category_name'] ?>" required>
            <button type="submit">Lưu</button>
        </form>
    </section>
</body>

</html>
