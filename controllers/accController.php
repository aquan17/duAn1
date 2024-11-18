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
    function insertUser()
    {
        
        if (isset($_POST['btn_add'])) {
            $name = $_POST['user'];
            $password = $_POST['pass'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dchi = $_POST['address'];
            

            // Kiểm tra các giá trị đầu vào
            if (empty($name) || empty($password) || empty($email) || empty($phone) || empty($dchi)) {
                echo "Vui lòng điền đầy đủ thông tin.";
                return;
            }

            if ($this->accModel->insertUser($name, $password, $email, $phone, $dchi)) {
                echo "<script>alert('Tạo tài khoản thành công');</script>";
                header("Location: ?act=/");
                
            } else {
                echo "Lỗi khi tạo mới user vào cơ sở dữ liệu.";
            }
        }
        require_once 'views/login.php';
    }
    
function forgotPassword($data)
{
    $email = $data['email'];

    if (empty($email)) {
        echo "Vui lòng nhập email khôi phục.";
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email không hợp lệ.";
        return;
    }

    // Thêm logic gửi email hoặc cập nhật mật khẩu tại đây
    echo "Hướng dẫn khôi phục mật khẩu đã được gửi đến email của bạn.";
}
}


?>
