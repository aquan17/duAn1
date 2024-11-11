<?php

// Hàm kết nối tới CSDL
function connectDB() {
    $host = "localhost";
    $dbname = "duan1";
    $username = "root";
    $password = "";
    $port = "3306";
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Lỗi kết nối CSDL: " . $e->getMessage();
    }
}
