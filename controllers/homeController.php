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
        require_once 'views/home.php'; 
        // require_once 'views/comment.php'; 
        // require_once 'views/profile/profile.php'; // Bao gồm view
    }
    public function shop()
    {
        // Số sản phẩm mỗi trang
        $limit = 9;
    
        // Tính toán tổng số sản phẩm
        $totalProducts = $this->homeModel->getTotalProducts();  // Lấy tổng số sản phẩm
        $totalPages = ceil($totalProducts / $limit);  // Tổng số trang
    
        // Xác định trang hiện tại
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $currentPage = max(1, min($currentPage, $totalPages));  // Đảm bảo trang hợp lệ
    
        // Tính toán offset
        $offset = ($currentPage - 1) * $limit;
    
        // Lấy các sản phẩm cho trang hiện tại
        $products = $this->homeModel->getProducts($limit, $offset);
    
        // Truyền dữ liệu vào view
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
        // Lấy thông tin chi tiết sản phẩm
        $s_details = $this->homeModel->findProductById($id);
        $relatedProducts = $this->homeModel->getRelatedProducts($id); // Lấy sản phẩm liên quan  
        $randomProducts = $this->homeModel->getRandomProducts($id); // Lấy 3 sản phẩm ngẫu nhiên từ danh mục 2 hoặc 3
        // Lấy các size và màu sắc của sản phẩm
        // $sizes = $this->homeModel->getProductSizes($id);  
        $colors = $this->homeModel->getProductColors($id);
    
        // Kiểm tra nếu tìm thấy sản phẩm, sau đó hiển thị
        if ($s_details) {
            // Truyền dữ liệu vào view
            require_once 'views/shop-details.php';  
        } else {
            echo 'Product not found';  // Nếu không tìm thấy sản phẩm
        }
        
    }
    function renderinfo(){
        $profile = $_SESSION['user'];
        $info = $this->accModel->getUser($profile);
        require_once 'views/profile/profile.php'   ;
    }
    
    function rendercheckout(){
        $user1 = $_SESSION['user'];  // Lấy người dùng hiện tại
        $user = $this->accModel->getUser($user1);  // Lấy thông tin người dùng từ model
    
        // Hiển thị trang checkout cho người dùng
        require_once 'views/checkout.php'; 
    
        // Kiểm tra nếu form đã được gửi và có sản phẩm được chọn
        if (isset($_POST['selected_products']) && !empty($_POST['selected_products'])) {
            // Lấy danh sách các sản phẩm đã chọn
            $selected_products = explode(',', $_POST['selected_products']);
            
            $total_price = 0;
            
            // Duyệt qua các sản phẩm đã chọn và tính tổng giá trị
            foreach ($selected_products as $product_id) {
                if (isset($_SESSION['carts'][$product_id])) {
                    $product = $_SESSION['carts'][$product_id];
                    $total_price += $product['price'] * $product['qty'];  // Tính tổng giá trị của từng sản phẩm đã chọn
                }
            }
            
            // Lưu tổng giá trị vào session
            $_SESSION['total_price'] = $total_price;
        } else {
            // Nếu không có sản phẩm nào được chọn, hiển thị thông báo
            echo "Không có sản phẩm nào được chọn.";
        }
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
public function placeOrder($full_name, $address, $city, $phone, $email, $note)
{
    // Lấy dữ liệu sản phẩm trong giỏ hàng
    $productsInCart = isset($_SESSION['carts']) ? $_SESSION['carts'] : [];
    $totalPrice = $_SESSION['sum_price']; // Tổng tiền

    // Lưu thông tin đơn hàng vào cơ sở dữ liệu và nhận ID đơn hàng cùng order_code
    list($order_id, $order_code) = $this->homeModel->createOrder($full_name, $address, $city, $phone, $email, $note, $totalPrice);

    $order_items = []; // Mảng chứa thông tin các sản phẩm trong đơn hàng
    // Lưu thông tin chi tiết đơn hàng vào bảng order_details và truyền order_code
    foreach ($productsInCart as $product_id => $product) {
        $this->homeModel->createOrderDetails($order_id, $product_id, $product['qty'], $product['price'], $order_code);

        // Thêm sản phẩm vào mảng order_items
        $order_items[] = [
            'title' => $product['title'],
            'quantity' => $product['qty'],
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
        'total_money' => $totalPrice,
        'items' => $order_items, // Lưu thông tin sản phẩm vào session
    ];

    // Chuyển hướng đến trang thành công hoặc thông báo đặt hàng thành công
    header("Location: views/success.php"); // Chuyển hướng đến trang thành công
    exit();
}


public function updateProfile($id)
{

    // Kiểm tra xem có form submit không
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Kiểm tra thông tin đầu vào (optional)
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            echo "<p style='color:red;'>Please fill all fields!</p>";
            return;
        }

        // Gọi phương thức model để cập nhật thông tin
        $this->homeModel->updateUserInfo($id, $name, $email, $phone, $address);

        // Sau khi cập nhật, chuyển hướng về trang profile
        header("Location: ?act=profile");  // Chuyển hướng tới trang profile
        exit;
    }

    // Nếu không phải POST, thì chỉ hiển thị thông tin người dùng
    $this->renderinfo($id);
}
public function odhistory() {
    // Kiểm tra xem email có tồn tại trong session không
    $email = $_SESSION['email'] ?? null;

    if ($email) {
        // Gọi phương thức từ model
        $odhistory = $this->homeModel->odhistory($email);

        if ($odhistory) {
            // Truyền dữ liệu đơn hàng vào view
            require_once 'views/profile/orderhistory.php';
        } else {
            echo "No orders found for this user.";
        }
    } else {
        echo "Error: User email not found. Please log in.";
    }
}

function deleteProduct($id)
{
    // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng
    if (isset($_SESSION['carts'][$id])) {
        // Xóa sản phẩm khỏi giỏ hàng
        unset($_SESSION['carts'][$id]);

        // Cập nhật lại tổng giá trị giỏ hàng
        

        // Thông báo thành công và chuyển hướng lại trang giỏ hàng
        $_SESSION['noti_cart'] = 1; // Đặt thông báo xóa thành công
        header("Location: ?act=Cart"); // Hoặc trang giỏ hàng của bạn
        exit();
    } else {
        // Thông báo lỗi nếu sản phẩm không tồn tại trong giỏ hàng
        $_SESSION['noti_cart'] = 2; // Đặt thông báo lỗi nếu không tìm thấy sản phẩm
        header("Location: ?act=Cart"); // Chuyển hướng về trang giỏ hàng
        exit();
    }
}
public function productDetails($id)
{
    // Lấy thông tin chi tiết sản phẩm
    $s_details = $this->homeModel->findProductById($id);
    $randomProducts = $this->homeModel->getRandomProducts($id); // Lấy 3 sản phẩm ngẫu nhiên từ danh mục 2 hoặc 3
    
    // Lấy các bình luận cho sản phẩm
    $comments = $this->homeModel->getProductComments($id);

    // Nếu không có bình luận, khởi tạo thành mảng rỗng
    if (!$comments) {
        $comments = [];  // Khởi tạo thành mảng rỗng nếu không có bình luận
    }

    // Xử lý khi người dùng gửi bình luận
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_text'])) {
        
        // Kiểm tra nếu người dùng đã đăng nhập
        if (isset($_SESSION['user_id'])) {
            
            $user_id = $_SESSION['user_id'];  // Lấy user_id từ session
            // $comment_name = $_POST['comment_name'];  // Lấy tên người bình luận
            // $comment_email = $_POST['comment_email'];  // Lấy email người bình luận
            $comment_text = trim($_POST['comment_text']);  // Lấy nội dung bình luận

            // Kiểm tra nếu nội dung bình luận không rỗng
            if (!empty($comment_text)) {
                // Thêm bình luận vào cơ sở dữ liệu
                $this->homeModel->addComment($id, $user_id,  $comment_text);

                // Sau khi thêm bình luận, chuyển hướng lại trang chi tiết sản phẩm để xem bình luận mới
                header("Location: ?act=comments&id=$id");
                exit;
            } else {
                $error_message = "Please enter a comment."; // Thông báo nếu không có nội dung bình luận
            }
        } else {
            $error_message = "You must be logged in to comment."; // Thông báo nếu chưa đăng nhập
        }
    }

    // Hiển thị chi tiết sản phẩm và bình luận trong view
    require_once 'views/shop-details.php';  // Load view chi tiết sản phẩm và bình luận
    require_once 'views/comment.php';
}
}
