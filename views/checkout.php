
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
   .error {
    color: red !important;
    font-size: 14px !important;
    margin-top: 5px !important;
    display: block !important;
}

</style>

</head>
<body>
 <?php  require_once 'menu.php' ?>
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
                <form action="?act=checkout" method="POST" onsubmit="return validateForm()">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Payment</h6>
                            <div class="checkout__input">
                                        <p>Tên<span>*</span></p>
                                        <input type="text" id="full_name" name="full_name" value="<?= $user['username'] ?>">
                                        <p class="error"></p> <!-- Thông báo lỗi dưới ô input -->
                            </div>
                            <div class="checkout__input">
                                <p>Địa Chỉ<span>*</span></p>
                                <input type="text" placeholder="Đường phố" id="address" name="address" value="<?= $user['address'] ?>">
                                <p class="error"></p> <!-- Thông báo lỗi dưới ô input -->
                            </div>
                            <div class="checkout__input">
                                <p>Thành Phố<span>*</span></p>
                                <input type="text" id="city" name="city">
                                <p class="error"></p> <!-- Thông báo lỗi dưới ô input -->
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>SDT<span>*</span></p>
                                        <input type="text" id="phone" name="phone" value="<?= $user['phone_number'] ?>">
                                        <p class="error"></p> <!-- Thông báo lỗi dưới ô input -->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" id="email" name="email" value="<?= $user['email'] ?>">
                                        <p class="error"></p> <!-- Thông báo lỗi dưới ô input -->
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Ghi Chú<span>*</span></p>
                                <input type="text" placeholder="Ghi chú về đơn hàng của bạn" id="note" name="note">
                                <p class="error"></p> <!-- Thông báo lỗi dưới ô input -->
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
<?php require_once 'footer.php' ?>
    <script>
        function validateForm() {
            var fullName = document.getElementById("full_name").value;
            var address = document.getElementById("address").value;
            var city = document.getElementById("city").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            var note = document.getElementById("note").value;

            var errorMessages = {};
            
            if (fullName == "") {
                errorMessages['full_name'] = "*Tên không được bỏ trống.";
            }
            if (address == "") {
                errorMessages['address'] = "*Địa chỉ không được bỏ trống.";
            }
            if (city == "") {
                errorMessages['city'] = "*Thành Phố không được bỏ trống.";
            }
            if (phone == "") {
                errorMessages['phone'] = "*Số điện thoại không được bỏ trống.";
            }
            if (email == "") {
                errorMessages['email'] = "*Email không được bỏ trống.";
            } else if (!validateEmail(email)) {
                errorMessages['email'] = "*Invalid email format.";
            }

            var errorFields = document.querySelectorAll('.error');
            errorFields.forEach(function(field) {
                field.innerHTML = '';  // Xóa các lỗi trước đó
            });

            var isValid = true;

            for (var field in errorMessages) {
                if (errorMessages.hasOwnProperty(field)) {
                    isValid = false;
                    var errorElement = document.getElementById(field).nextElementSibling;
                    errorElement.innerHTML = errorMessages[field];
                }
            }

            return isValid;  // Nếu có lỗi, không gửi form
        }

        function validateEmail(email) {
            var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return regex.test(email);
        }
    </script>
</body>
</html>
