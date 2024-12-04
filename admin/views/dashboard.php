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
</head>

<body>
    <?php require_once 'views/components/navbar.php'; ?>

    <section id="content">
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>1020</h3>
                        <p>New Order</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>2834</h3>
                        <p>Visitors</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h3>$2543</h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Orders</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Date Order</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($get)): ?>
                                <tr>
                                    <td colspan="3">No orders found.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($get as $order): ?>
                                    <tr>
                                        <td>
                                            <!-- <img src="img/people.png" alt="Profile Picture"> -->
                                            <p><?= htmlspecialchars($order['full_name']) ?></p>
                                        </td>
                                        <td><?= htmlspecialchars($order['order_date']) ?></td>
                                        <td><?= $order['status'] == 1
                                                ? '<span class="badge badge-success">Đã xử lý</span>'
                                                : ($order['status'] == 2
                                                    ? '<span class="status process">Đang xử lý</span>'
                                                    : ($order['status'] == 3
                                                        ? '<span class="status pending">Hủy đơn</span>'
                                                        : ($order['status'] == 4
                                                            ? '<span class="status completed">Đã giao</span>'
                                                            : ($order['status'] == 5
                                                                ? '<span class="status pending">Đang giao</span>'
                                                                : '<span class="badge badge-secondary">Chưa xử lý</span>'
                                                            )
                                                        )
                                                    )
                                                );
                                            ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>


                            <!-- <tr>
                                 <td>
                                    <img src="img/people.png">
                                    <p>Lăng Minh Đăng</p>
                                </td>
                                <td>01-4-2023</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>Nguyễn Hữu Đan</p>
                                </td>
                                <td>07-2-2022</td>
                                <td><span class="status process">Process</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>Nguyễn Đức Phú</p>
                                </td>
                                <td>27-5-2024</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>J97</p>
                                </td>
                                <td>14-8-2022</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Todos</h3>
                        <i class='bx bx-plus'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </section>
</body>

</html>