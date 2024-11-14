<!-- Offcanvas Menu Begin -->
<?php require_once 'menu.php' ?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">Payment</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Tên<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Địa Chỉ<span>*</span></p>
                            <input type="text" placeholder="Đường phố" class="checkout__input__add">
                            <input type="text" placeholder="Căn hộ, số nhà">
                        </div>
                        <div class="checkout__input">
                            <p>Thành Phố<span>*</span></p>
                            <input type="text">
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>SDT<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input">
                            <p>Ghi Chú<span>*</span></p>
                            <input type="text"
                                placeholder="Ghi chú về đơn hàng của bạn">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                <?php
                                if (isset($_SESSION['carts']) && !empty($_SESSION['carts'])) {
                                    foreach ($_SESSION['carts'] as $value) {
                                        echo "<li>{$value['title']} <span>" . number_format($value['price'] * $value['qty']) . "đ</span></li>";
                                    }
                                }
                                ?>
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Total <span><?php echo number_format($_SESSION['sum_price']); ?>đ</span></li>
                            </ul>
                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<!-- Footer Section Begin -->
<?php require_once 'footer.php' ?>
<!-- Footer Section End -->



</body>

</html>