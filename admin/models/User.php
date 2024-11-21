<?php
require_once "../commons/function.php"; // Hàm kết nối DB

class User {
    public $conn = null;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy tất cả người dùng
    public function all() {
        $sql = "SELECT * FROM user ORDER BY user_id DESC";  // Kiểm tra tên bảng 'user'
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Trả về tất cả các người dùng
    }

    // Lấy một người dùng theo ID
    public function find_one($id) {
        $sql = "SELECT * FROM user WHERE user_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về thông tin người dùng
    }

    // Thêm một người dùng
    public function insert($data) {
        $sql = "INSERT INTO user (username, password, email, phone_number, address, role_id) 
                VALUES (:username, :password, :email, :phone_number, :address, :role_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    // Cập nhật thông tin người dùng
    public function update($data) {
        // Chỉ thay đổi mật khẩu nếu có giá trị cho password
        $sql = "UPDATE user SET username=:username, email=:email, 
                    phone_number=:phone_number, address=:address, role_id=:role_id 
                    WHERE user_id=:id";
        
        // Nếu password có trong mảng dữ liệu, thêm vào câu SQL
        if (isset($data['password']) && !empty($data['password'])) {
            $sql = "UPDATE user SET username=:username, password=:password, email=:email, 
                    phone_number=:phone_number, address=:address, role_id=:role_id 
                    WHERE user_id=:id";
        }
    
        // Thực thi câu truy vấn
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);  // Truyền đúng mảng dữ liệu
    }
    

    // Xóa người dùng
    public function delete($id) {
        $sql = "DELETE FROM user WHERE user_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
