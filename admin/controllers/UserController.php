<?php
require_once "models/User.php";  // Kết nối với model User

class UserController {

    // Lấy danh sách người dùng
    public function list() {
        $users = (new User())-> all();  // Lấy tất cả người dùng từ model
        view('user/list', ['users' => $users]);  // Truyền dữ liệu vào view
    }

    // Thêm người dùng mới
    public function add() {
        view('user/add');  // Hiển thị form thêm người dùng
    }

    // Lưu thông tin người dùng mới
    public function store() {
        $data = $_POST;  // Lấy dữ liệu từ form
        (new User())->insert($data);  // Thêm người dùng mới vào cơ sở dữ liệu
        header("Location: index.php?ctl=user-list");  // Chuyển hướng về danh sách người dùng
        die;
    }

    // Chỉnh sửa thông tin người dùng
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Lấy dữ liệu từ form
            $data = $_POST;
            $data['id'] = $_GET['id'];  // Lấy ID từ URL
    
            // Kiểm tra nếu mật khẩu trống thì không gửi mật khẩu
            if (empty($data['password'])) {
                unset($data['password']);  // Loại bỏ password nếu không thay đổi
            }
    
            // Cập nhật người dùng
            (new User())->update($data);  
    
            // Sau khi cập nhật, chuyển hướng về danh sách người dùng
            header("Location: index.php?ctl=user-list");
            die;
        }
    
        // Nếu không phải POST, lấy thông tin người dùng từ DB và hiển thị form
        $id = $_GET['id'];  // Lấy ID người dùng từ URL
        $user = (new User())->find_one($id);  // Lấy thông tin người dùng
        view('user/edit', ['user' => $user]);  // Truyền dữ liệu vào view
    }
    
    
    

    // Xóa người dùng
    public function delete() {
        $id = $_GET['id'];  // Lấy ID từ URL
        (new User())->delete($id);  // Xóa người dùng
        header("Location: index.php?ctl=user-list");  // Chuyển hướng về danh sách người dùng
        die;
    }
}
