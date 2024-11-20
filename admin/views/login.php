<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .login-container {
            background: #fff;
            padding: 30px 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #888;
            font-size: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #6e8efb;
            box-shadow: 0 0 5px rgba(110, 142, 251, 0.5);
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: #fff;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #5a77d8, #9454e3);
        }

        .login-container .footer {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }

        .login-container .footer a {
            color: #6e8efb;
            text-decoration: none;
            font-weight: bold;
        }

        .login-container .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập Admin</h2>
        <form action="login_process.php" method="POST">
            <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="text" name="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <button type="submit" class="btn-login">Đăng nhập</button>
        </form>
        <div class="footer">
            <p>Quên mật khẩu? <a href="#">Nhấn vào đây</a></p>
        </div>
    </div>
</body>
</html>
