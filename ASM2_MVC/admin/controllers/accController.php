<?php
class accController{
    public $accModel;
    function __construct(){
        $this->accModel= new accModel();
    }
    function login(){
        require_once 'views/login.php';
        if(isset($_POST['swich'])){
            if($this->accModel->checkAcc($_POST['user'],$_POST['pass'])>0){
                $_SESSION['user']=$_POST['user'];
                header("Location:?act=home");
            }else{
                echo "<script>alert('không đăng nhập thành công!')</script>";
            }
        }
    }
    function logout(){
        unset($_SESSION['user']);
        header("Location:./");
    }
        
    
}


?>