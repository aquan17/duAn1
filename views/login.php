<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Đăng Nhập</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="./assets/css/login.css">
</head>


<body>

    <!-- Popup Đăng Nhập -->
    <div id="loginPopup" class="popup login-popup">
    <div class="popup-content">
        <span id="closeBtn" class="close-btn">&times;</span>
        <h2>Đăng Nhập</h2>

        <!-- <form method="post" action="?act=signup">
    <input type="radio" id="login_swich" name="swich" checked />
    <input type="radio" id="signup_swich" name="swich" />
    <input type="radio" id="forgot_swich" name="swich" />
    <span class="label_wrap">
        <label for="login_swich">Đăng Nhập</label>
        <label for="signup_swich">Đăng Ký</label>
        <label for="forgot_swich">Forgot Password</label>
    </span>
    <input placeholder="Username" name="user" />
    <input placeholder="Password" type="password" name="pass" />
    <input placeholder="Confirm password" type="password" id="confirm" />

    <input placeholder="Email" type="email" name="email" id="email" />
    <input placeholder="Số điện thoại" type="text" name="phone" id="phone" />
    <input placeholder="Địa chỉ" type="text" name="address" id="address" />
    <input placeholder="Recovery email" type="password" id="forgot" />
    <div class="form_btns">
        <a><label for="forgot_swich">Forgot password?</label></a>
        <button id="login_btn">Đăng Nhập</button>
        <a><label for="signup_swich">Create account</label></a>
    </div>
    <div class="form_btns">
        <button id="signup_btn" name="btn_add">Đăng Ký</button>
        <a><label for="login_swich">Đăng Nhập</label></a>
    </div>
    <div class="form_btns">
        <button id="forgot_btn">Reset Password</button>
    </div>
</form> -->
<form method="post" action="?act=auth ">
<input type="hidden" id="actionType" name="actionType" value="login">

    <input type="radio" id="login_swich" name="swich" value="login" checked />
    <input type="radio" id="signup_swich" name="swich" value="signup" />
    <input type="radio" id="forgot_swich" name="swich" value="forgot" />

    <span class="label_wrap">
        <label for="login_swich">Đăng Nhập</label>
        <label for="signup_swich">Đăng Ký</label>
        <label for="forgot_swich">Forgot Password</label>
    </span>

    <input placeholder="Username" name="user" />
    <input placeholder="Password" type="password" name="pass" />
    <input placeholder="Email" type="email" name="email" id="email" />
    <input placeholder="Số điện thoại" type="text" name="phone" id="phone" />
    <input placeholder="Địa chỉ" type="text" name="address" id="address" />
    <!-- <input placeholder="Confirm password" type="password" id="confirm" /> -->

    <div class="form_btns">
        <button id="login_btn" type="submit">Đăng Nhập</button>
        <!-- <button id="forgot_btn" type="submit">Khôi Phục</button> -->
        <a><label for="forgot_swich">Forgot password?</label></a>
    </div>
     <div class="form_btns">
        <button id="signup_btn" name="btn_add">Đăng Ký</button>
        <a><label for="login_swich">Đăng Nhập</label></a>
    </div>
    <div class="form_btns">
        <button id="forgot_btn">Reset Password</button>
        <a><label for="login_swich">Đăng Nhập</label></a>
    </div>
</form>


    </div>
</div>
<script src="./assets/js/login.js"></script>
</body>

</html>