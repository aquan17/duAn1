<!-- views/comment/listcomment.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bình luận</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
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
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .table th {
            background-color: #0d6efd;
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn {
            padding: 6px 12px;
            font-size: 0.9rem;
            border-radius: 5px;
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
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <?php require_once 'views/components/navbar.php'; ?>

    <section id="content">
        <div class="container-fluid">
            <h2>Danh sách bình luận</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nội dung</th>
                        <th>User ID</th>
                        <th>Product ID</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comments as $comment): ?>
                        <tr>
                            <td><?php echo $comment['comment_id']; ?></td>
                            <td><?php echo htmlspecialchars($comment['note']); ?></td>
                            <td><?php echo $comment['user_id']; ?></td>
                            <td><?php echo $comment['product_id']; ?></td>
                            <td><?php echo $comment['created_at']; ?></td>
                            <td>
                                <?php if ($comment['status'] == 1): ?>
                                    <span class="badge badge-success">Hiển thị</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">Đã ẩn</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($comment['status'] == 1): ?>
                                    <a href="index.php?ctl=comment-hide&id=<?php echo $comment['comment_id']; ?>" class="btn btn-danger btn-sm">Ẩn</a>
                                <?php else: ?>
                                    <a href="index.php?ctl=comment-show&id=<?php echo $comment['comment_id']; ?>" class="btn btn-primary btn-sm">Hiện</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
