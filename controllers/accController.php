<?php
// session_start(); // Đảm bảo rằng phiên làm việc được bắt đầu đầu file

class accController
{
    public $accModel;

    function __construct()
    {
        $this->accModel = new accModel();
    }

    function login()
    {
        // require_once 'views/login.php'; // Gọi giao diện đăng nhập

        if (isset($_POST['swich'])) { // Kiểm tra xem nút đăng nhập đã được chọn chưa
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            if ($this->accModel->checkAcc($user, $pass)) { // Kiểm tra thông tin đăng nhập
                $_SESSION['user'] = $user;
                echo "<script>alert('Đăng nhập thành công!');</script>";
                header("Location: ?act=/");
                exit();
            } else {
                echo "<script>alert('Không đăng nhập thành công!');</script>";
            }
        }
    }

    function logout()
    {
        session_destroy(); // Xóa toàn bộ phiên làm việc
        header("Location: ?act=/");
        exit();
    }
}

?>
