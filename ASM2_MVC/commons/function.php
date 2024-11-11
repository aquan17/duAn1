<?php
function connectDB(){
    try{
        $conn = new PDO("mysql:host=localhost;dbname=web2024su24","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch(PDOException $e){
        echo "kết nối CSDL thất bại: ".$e->getMessage();
    }
}

?>