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
</head>

<body>
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="?act=home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="?ctl=product-list">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Quản Lý Sản Phẩm</span>
                </a>
            </li>

            <li>
                <a href="?ctl=category-list">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Quản Lý Danh Mục</span>
                </a>
            </li>
            <li>
                <a href="?act=user">
                    <i class='bx bxs-user'></i>
                    <span class="text">Quản Lý Khách Hàng</span>
                </a>
            </li>
            <li>
                <a href="../?act=/">
                    <p style="margin: 8px;">🧋</p>
                    <span class="text">Shop</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="../?act=logout" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <!-- <hearder style="margin-top: -10px;  ">
                Xin Chào,
                <?php
                // if (isset($_SESSION['user'])) {
                //     echo $_SESSION['user'];
                // } else {
                //     header('Location: ./');
                // }
                ?>
            </hearder> -->
            <a href="#" class="profile">
            </a>
        </nav>
    </section>
</body>
</html>
