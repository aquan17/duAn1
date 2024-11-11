<?php
require_once 'models/homeModel.php';

class homeController
{
    public $homeModel;

    function __construct()
    {
        $this->homeModel = new homeModel();
    }

    function home()
    {
        $products = $this->homeModel->Product(); // Lấy 8 sản phẩm
        $shirts = $this->homeModel->getShirt(); // Lấy sản phẩm áo
        $jeans = $this->homeModel->getJeans(); // Lấy sản phẩm quần jeans
        $jackets = $this->homeModel->getJacket(); // Lấy sản phẩm áo khoác
        $t_shirts = $this->homeModel->getT_shirt(); // Lấy sản phẩm áo thun
        $hoodie = $this->homeModel->getHoodie(); // Lấy sản phẩm quần short
        $newArrivals = $this->homeModel->getNewArrivals(); // Lấy sản phẩm mới
        // $hotSales = $this->homeModel->getHotSales(); // Lấy sản phẩm hot sales
        // $bestSellers = $this->homeModel->getBestSellers(); // Fetch Best Sellers
        require_once 'views/home.php'; // Bao gồm view
    }
    function Shop()
    {
        $products = $this->homeModel->Products();
        require_once 'views/shop.php';
    }
    public function spCard($id) {
        // Lấy sản phẩm từ homeModel
        $row = $this->homeModel->spCart($id);
    
        // Kiểm tra nếu không tìm thấy sản phẩm
        if (!$row) {
            echo "Sản phẩm không tồn tại!";
            return;
        }
        if (!isset($row['qty'])) {
            $row['qty'] = 1;
        }
        // Kiểm tra nếu người dùng nhấn nút "Add To Cart"
        if (isset($_POST['btn_add'])) {
            // Kiểm tra xem giỏ hàng đã tồn tại trong session hay chưa
            if (!isset($_SESSION['carts'])) {
                $_SESSION['carts'] = [];
            }
    
            // Thêm sản phẩm vào giỏ hàng hoặc tăng số lượng nếu sản phẩm đã có
            if (array_key_exists($id, $_SESSION['carts'])) {
                $_SESSION['carts'][$id]['qty'] += 1;  // Tăng số lượng sản phẩm
            } else {
                $_SESSION['carts'][$id] = $row;  // Thêm sản phẩm mới vào giỏ
                $_SESSION['carts'][$id]['qty'] = 1;
            }
    
            // In ra giỏ hàng để kiểm tra
            echo "<pre>";
            print_r($_SESSION['carts']);
            echo "</pre>";
        }
    
        // Hiển thị trang giỏ hàng
        require_once 'views/shopping-cart.php';
    }
    
    
}
