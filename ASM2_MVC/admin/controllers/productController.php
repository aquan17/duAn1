<?php

require_once 'models/productModel.php';

class productController
{
    public $productModel;

    function __construct()
    {
        $this->productModel = new productModel();
    }

    function listProduct()
    {
        $allProduct = $this->productModel->getAllProduct();
        require_once 'views/listProduct.php';
    }

    function insertProduct()
    {
        require_once 'views/insertProduct.php';
        if (isset($_POST['btn_insert'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $detail = $_POST['detail'];
            $cate = $_POST['cate'];
            $discount = $_POST['discount']; // Nhận giá trị discount từ form
            $img = $_FILES['img']['name'];
            $tmp = $_FILES['img']['tmp_name'];

            // Kiểm tra các giá trị đầu vào
            if (empty($name) || empty($price) || empty($cate) || empty($img) || empty($discount)) {
                echo "Vui lòng điền đầy đủ thông tin.";
                return;
            }

            move_uploaded_file($tmp, '../assets/images/' . $img);
            if ($this->productModel->insertProduct($name, $img, $price, $detail, $cate, $discount)) {
                header("Location: ?act=listproduct");
            } else {
                echo "Lỗi khi chèn sản phẩm vào cơ sở dữ liệu.";
            }
        }
    }

    function updateProduct($id)
    {
        $oneProduct = $this->productModel->findProductById($id);
        require_once 'views/updateProduct.php';
        if (isset($_POST['btn_update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $detail = $_POST['detail'];
            $cate_id = $_POST['cate'];
            $discount = $_POST['discount']; // Nhận giá trị discount từ form
            if (empty($_FILES['img']['name'])) {
                $img = "";
            } else {
                $img = $_FILES['img']['name'];
                $tmp = $_FILES['img']['tmp_name'];
                move_uploaded_file($tmp, '../assets/images/' . $img);
            }
            if ($this->productModel->updateProduct($id, $name, $img, $price, $detail, $cate_id, $discount)) {
                header("Location:?act=listproduct");
            } else {
                echo "Lỗi";
            }
        }
    }

    function deleteProduct($id)
    {
        if ($this->productModel->deleteProduct($id)) {
            header("Location: ?act=listproduct");
        } else {
            echo "Lỗi khi xóa sản phẩm.";
        }
    }
}
?>
