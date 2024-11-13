<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
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
    <link rel="stylesheet" href="./assets/css/quantity.css">
</head>

<body>
    <?php require_once 'menu.php' ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                    <table>
    <thead>
        <tr>
            <th>Select</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <!-- table shopping-cart -->
    <tbody>
        <?php
        $_SESSION['sum_price'] = 0;
        if (isset($_SESSION['carts']) && !empty($_SESSION['carts'])) {
            foreach ($_SESSION['carts'] as $value) {
        ?>
                <tr>
                    <!-- Checkbox Column -->
                    <td class="select__item">
                        <input type="checkbox" name="selected_products[]" value="<?= $value['product_id'] ?>">
                    </td>
                    <td class="product__cart__item">
                        <div class="product__cart__item__pic">
                            <img src="./assets/images/product/<?= $value['image'] ?>" alt="" width="100px">
                        </div>
                        <div class="product__cart__item__text">
                            <h6><?= $value['title'] ?></h6>
                            <h5><?= number_format($value['price']) . 'đ' ?></h5>
                        </div>
                    </td>
                    <td class="quantity__item">
                        <div class="quantity">
                            <div class="product-quantity">
                                <form action="?act=update_quantity" method="post" class="product-quantity-form">
                                    <input type="hidden" name="product_id" value="<?= $value['product_id'] ?>">

                                    <!-- Nút Giảm Số Lượng -->
                                    <button type="submit" name="action" value="decrease" class="quantity-btn">-</button>

                                    <!-- Hiển Thị Số Lượng -->
                                    <input type="text" id="quantity" name="quantity" value="<?= $value['qty'] ?>" readonly>

                                    <!-- Nút Tăng Số Lượng -->
                                    <button type="submit" name="action" value="increase" class="quantity-btn">+</button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="cart__price">
                        <?php
                        $total = $value['price'] * $value['qty'];
                        $_SESSION['sum_price'] += $total;
                        echo number_format($total);
                        ?>
                    </td>
                    <td class="cart__close"><i class="fa fa-close"></i></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
    <!-- End table shopping-cart -->
</table>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="?act=shop">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <!-- <li>Subtotal <span>$ 169.50</span></li> -->
                            <li>Total <span><?= number_format($_SESSION['sum_price']).'đ' ?></span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php require_once 'footer.php' ?>

    <!-- Js Plugins -->

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