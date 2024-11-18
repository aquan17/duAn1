<?php
class accModel
{
    public $conn;
    function __construct()
    {
        $this->conn = connectDB();
    }
    function checkAcc($user, $pass)
    {
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user, $pass]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            $_SESSION['user'] = $user;
            $_SESSION['role'] = $row['role_id']; // Lưu vai trò người dùng vào session
            return true;
        } else {
            return false;
        }
    }
    function insertUser($name, $password, $email, $phone, $dchi)
    {
        $sql = "INSERT INTO user (username, password, email, phone_number, address) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $password, $email, $phone, $dchi]);
    }
}
