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
    $sql = "SELECT * FROM acc WHERE user = '$user' AND pass = '$pass'";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        $_SESSION['user'] = $user;
        $_SESSION['role'] = $row['role']; // Lưu vai trò người dùng vào session
        return true;
    } else {
        return false;
    }
}

}
