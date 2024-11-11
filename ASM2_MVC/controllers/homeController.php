<?php
require_once 'models/homeModel.php';

class homeController {
    public $homeModel;

    function __construct() {
        $this->homeModel = new homeModel();
    }

    function home() {
        $product = $this->homeModel->Product();
        $getSnacks = $this->homeModel->getSnacks();
        $getDrinks = $this->homeModel->getDrinks();
        $cream = $this->homeModel->cream();

        require_once 'views/home.php';
    }

    function detailPro($id) {
        $productOne = $this->homeModel->findProductById($id);
        $relatedProducts = $this->homeModel->getRelatedProducts($id); // Lấy sản phẩm liên quan
        $randomProducts = $this->homeModel->getRandomProducts($id); // Lấy 3 sản phẩm ngẫu nhiên từ danh mục 2 hoặc 3
        require_once 'views/detailProduct.php';
    }
    
}
?>
