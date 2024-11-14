<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Đăng Nhập</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Mặc định popup ẩn */
    /* CSS cho popup đăng nhập */
.popup {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.login-popup .popup-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 8px;
    width: 500px;
    text-align: center;
}

.login-popup .close-btn {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.login-popup .close-btn:hover,
.login-popup .close-btn:focus {
    color: black;
    text-decoration: none;
}

.login-popup form {
    display: flex;
    flex-direction: column;
    padding: 50px 30px;
    border-radius: 15px;
    gap: 20px;
}

.login-popup .label_wrap>label {
    margin-right: 10px;
}

.login-popup .label_wrap>label:last-child,
.login-popup input[type="radio"],
.login-popup #forgot {
    display: none;
}

.login-popup input {
    border: none;
    min-width: 350px;
    color: black;
    padding: 10px;
    background-color: #aaa;
    outline: none;
    border-radius: 5px;
}

.login-popup form>div {
    display: flex;
    flex-direction: column;
    gap: 10px;
    border-bottom: 1px solid #333333;
}

.login-popup form>div>a {
    font-size: 12px;
    color: #ccc;
    margin-top: -10px;
    margin-bottom: 15px;
    align-self: flex-end;
}

.login-popup form > div > a:last-child {
    padding: 0 5px;
    width: max-content;
    margin: auto;
    display: inline-block;
    text-align: center;
    transform: translateY(50%);
    color: #ffb800;
    background: #121212;
}

.login-popup form button {
    border: none;
    border-radius: 5px;
    padding: 10px;
    background: #ffb800;
}

.login-popup form button,
.login-popup .label_wrap>label,
.login-popup .form_btns a label {
    transition: 0.3s ease;
    cursor: pointer !important;
}

.login-popup form button:hover,
.login-popup .label_wrap>label:hover,
.login-popup .form_btns a label:hover {
    filter: brightness(1.2);
}

.login-popup #login_swich:checked~.label_wrap>label:nth-child(1),
.login-popup #signup_swich:checked~.label_wrap>label:nth-child(2),
.login-popup #forgot_swich:checked~.label_wrap>label:nth-child(3) {
    color: #ffb800;
    font-weight: bold;
    padding-bottom: 5px;
    border-bottom: 2px solid #ffb800;
    display: inline-block;
}

.login-popup #forgot_swich:checked~.label_wrap>label:not(:nth-child(3)) {
    display: none;
}

.login-popup #login_swich:checked~div:not(:nth-of-type(1)),
.login-popup #login_swich:checked~#confirm {
    display: none;
}

.login-popup #signup_swich:checked~div:not(:nth-of-type(2)) {
    display: none;
}

.login-popup #forgot_swich:checked~div:not(:nth-of-type(3)),
.login-popup #forgot_swich:checked~input:not(:last-of-type) {
    display: none;
}

.login-popup #forgot_swich:checked~#forgot {
    display: inline;
}

</style>

<body>

    <!-- Popup Đăng Nhập -->
    <div id="loginPopup" class="popup login-popup">
    <div class="popup-content">
        <span id="closeBtn" class="close-btn">&times;</span>
        <h2>Đăng Nhập</h2>
        <form method="post">
            <input type="radio" id="login_swich" name="swich" checked />
            <input type="radio" id="signup_swich" name="swich" />
            <input type="radio" id="forgot_swich" name="swich" />
            <span class="label_wrap">
                <label for="login_swich">Log in</label>
                <label for="signup_swich">Sign up</label>
                <label for="forgot_swich">Forgot Password</label>
            </span>
            <input placeholder="Username" name="user" />
            <input placeholder="Password" type="password" name="pass" />
            <input placeholder="Confirm password" type="password" id="confirm" />
            <input placeholder="Recovery email" type="password" id="forgot" />
            <div class="form_btns">
                <a><label for="forgot_swich">Forgot password?</label></a>
                <button id="login_btn">Log in</button>
                <a><label for="signup_swich">Create account</label></a>
            </div>
            <div class="form_btns">
                <button id="signup_btn">Sign up</button>
                <a><label for="login_swich">Login</label></a>
            </div>
            <div class="form_btns">
                <button id="forgot_btn">Reset Password</button>
            </div>
        </form>
    </div>
</div>


    <script>
        // Lấy các phần tử cần thiết
        const loginBtn = document.getElementById('loginBtn');
        const popup = document.getElementById('loginPopup');
        const closeBtn = document.getElementById('closeBtn');

        // Mở popup khi nhấn nút đăng nhập
        loginBtn.onclick = function() {
            popup.style.display = 'block';
        }

        // Đóng popup khi nhấn vào nút đóng
        closeBtn.onclick = function() {
            popup.style.display = 'none';
        }

        // Đóng popup khi click ra ngoài
        window.onclick = function(event) {
            if (event.target == popup) {
                popup.style.display = 'none';
            }
        }
    </script>
</body>

</html>