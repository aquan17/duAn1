<?php
require_once 'models/homeModel.php';

class homeController
{
    public $accModel;
    public $homeModel;

    function __construct()
    {
        $this->homeModel = new homeModel();
        $this->accModel = new accModel();
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
        // require_once 'views/checkout.php'; // Bao gồm view
        require_once 'views/home.php'; // Bao gồm view
    }
    function Shop()
    {
        $products = $this->homeModel->Products();
        require_once 'views/shop.php';
    }
    

    public function spCard($id)
    {
        // Lấy sản phẩm từ cơ sở dữ liệu
        // echo $_GET['id'];
        $row = $this->homeModel->spCart($id);

        // Kiểm tra nếu không có qty thì set mặc định là 1
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
            $_SESSION['noti_cart'] = 1;
        }
        header("location: ?act=shop");
        // Hiển thị trang giỏ hàng
        // require_once 'views/shopping-cart.php';
    }
    public function updateQuantity()
    {
        $products = $this->homeModel->Products();
        if (isset($_POST['product_id']) && isset($_POST['action'])) {
            $product_id = $_POST['product_id'];
            $action = $_POST['action'];

            // Kiểm tra xem sản phẩm có trong giỏ hàng không
            if (isset($_SESSION['carts'][$product_id])) {
                if ($action === 'increase') {
                    // Tăng số lượng sản phẩm
                    $_SESSION['carts'][$product_id]['qty'] += 1;
                } elseif ($action === 'decrease') {
                    // Giảm số lượng sản phẩm
                    if ($_SESSION['carts'][$product_id]['qty'] > 1) {

                        $_SESSION['carts'][$product_id]['qty'] --;
                    }

                    // Nếu số lượng giảm về 0, xóa sản phẩm khỏi giỏ hàng
                    // if ($_SESSION['carts'][$product_id]['qty'] <= 0) {
                    //     unset($_SESSION['carts'][$product_id]);
                    // }
                }
            }
        }

        // Sau khi cập nhật số lượng, chuyển hướng lại trang giỏ hàng
        header("Location: ?act=Cart");
        exit();
    }
    // homeController.php
    public function shop_details($id)
    {
        $s_details = $this->homeModel->findProductById($id);  // Lấy chi tiết sản phẩm
        if ($s_details) {
            require_once 'views/shop-details.php';  // Truyền dữ liệu vào view
        } else {
            echo 'Product not found';  // Nếu không tìm thấy sản phẩm
        }
        
        // echo "<pre>";
        // $s_details;
        // echo "</pre>";
    }
    function rendercheckout(){
        $user1 = $_SESSION['user'];
        $user = $this->accModel->getUser($user1);
        require_once 'views/checkout.php'   ;
    }
    public function checkout()
{
    // Kiểm tra nếu người dùng chưa điền đầy đủ thông tin
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $note = $_POST['note'];

        // Kiểm tra các trường bắt buộc
        $errors = [];
        if (empty($full_name)) $errors[] = 'full name is required.';
        if (empty($address)) $errors[] = 'Address is required.';
        if (empty($city)) $errors[] = 'City is required.';
        if (empty($phone)) $errors[] = 'Phone number is required.';
        if (empty($email)) $errors[] = 'Email is required.';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email format.';

        // Nếu có lỗi, hiển thị thông báo lỗi và không lưu đơn hàng
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
            return; // Dừng lại và không thực hiện lưu đơn hàng
        }

        // Nếu không có lỗi, thực hiện lưu đơn hàng
        $this->placeOrder($full_name,  $address, $city, $phone, $email, $note);
    }

    // Lấy dữ liệu sản phẩm trong giỏ hàng từ session
    $productsInCart = isset($_SESSION['carts']) ? $_SESSION['carts'] : [];
    $totalPrice = 0;
    foreach ($productsInCart as $value) {
        $totalPrice += $value['price'] * $value['qty']; // Tính tổng tiền
    }

    // Lưu tổng giá trị vào session nếu cần
    $_SESSION['sum_price'] = $totalPrice;

    // Truyền dữ liệu giỏ hàng vào view thanh toán
    require_once 'views/checkout.php';
}
public function placeOrder($full_name,$address, $city, $phone, $email, $note)
{
    // Lấy dữ liệu sản phẩm trong giỏ hàng
    $productsInCart = isset($_SESSION['carts']) ? $_SESSION['carts'] : [];
    $totalPrice = $_SESSION['sum_price']; // Tổng tiền

    // Lưu thông tin đơn hàng vào cơ sở dữ liệu
    $order_id = $this->homeModel->createOrder($full_name,  $address, $city, $phone, $email, $note, $totalPrice);

    // Sau khi tạo đơn hàng, lưu thông tin chi tiết đơn hàng vào bảng order_details
    $order_items = []; // Mảng chứa thông tin các sản phẩm trong đơn hàng
    foreach ($productsInCart as $product_id => $product) {
        // Lưu thông tin chi tiết vào bảng order_details
        $this->homeModel->createOrderDetails($order_id, $product_id, $product['qty'], $product['price']);
        // Thêm sản phẩm vào mảng $order_items để lưu vào session
        $order_items[] = [
            'title' => $product['title'],
            'quantity' => $product['qty'],`
            'price' => $product['price']
        ];
    }

    // Sau khi lưu đơn hàng, xóa giỏ hàng khỏi session
    unset($_SESSION['carts']);
    unset($_SESSION['sum_price']);

    // Lưu thông tin đơn hàng vào session để hiển thị sau đó
    $_SESSION['order_info'] = [
        'order_id' => $order_id,
        'full_name' => $full_name,
        'phone' => $phone,
        'email' => $email,
        'address' => $address,
        'city' => $city,
        'total_money' => $totalPrice,  // Sử dụng biến $totalPrice
        'items' => $order_items, // Đây là mảng chứa thông tin các sản phẩm trong đơn hàng
    ];

    // Chuyển hướng đến trang thành công hoặc thông báo đặt hàng thành công
    header("Location: success.php"); // Chuyển hướng đến trang thành công
    exit();
}


}
