<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Quần Áo</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/search.css">
    <style>
   


/* Basic styling for the login button */
#loginBtn {
    
    z-index: 10; /* Ensure it stays above other elements */
}


/* Initially hide the dropdown text */
#loginBtn .dropdown-text {
    display: none;  /* Initially hidden */
    position: absolute;
    top: 35px;
    left: 0;
    background-color: black;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 14px;
    white-space: nowrap;
    z-index: 10;  /* Ensure the dropdown text appears above other elements */
    opacity: 0;  /* Make the dropdown invisible by default */
    visibility: hidden; /* Make it hidden until shown */
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

/* Show dropdown text when hovering over the login button */
#loginBtn:hover .dropdown-text,
#loginBtn .dropdown-text:hover {
    display: block;
    opacity: 1;  /* Hiển thị dropdown-text */
    visibility: visible;  /* Đảm bảo dropdown-text hiển thị */
}

/* Optional: Faded effect on icon when clicked or hovered */
#loginBtn:hover img {
    opacity: 0.8;
}

</style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href=""><img src="./assets/images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="?act=/">Home</a></li>
                        <li><a href="?act=shop">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./about.html">About Us</a></li>
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="?act=Cart">Shopping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" id="searchIcon" class="search-switch"><img src="./assets/images/icon/search.png" alt=""></a>
                    <a href="#"><img src="./assets/images/icon/heart.png" alt=""></a>
                    <a href="?act=Cart"><img src="./assets/images/icon/cart.png" alt=""></a>
                    <a href="#" id="loginBtn">
    <img src="./assets/images/icon/user1.png" alt="">
    <span class="dropdown-text">Đăng Nhập</span>
</a>

                  
                
            
                    <?php require_once 'login.php' ?>
                </div>
                <div id="searchContainer" style="display: none;">
                    <input type="text" id="searchInput" placeholder="Search for products..." />
                    <button id="searchButton">Search</button>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>

    <script src="./assets/js/jquery-3.3.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.nicescroll.min.js"></script>
    <script src="./assets/js/jquery.magnific-popup.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/jquery.slicknav.js"></script>
    <script src="./assets/js/mixitup.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>