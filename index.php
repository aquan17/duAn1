<?php
session_start();
// session_destroy();

require_once 'commons/function.php';
require_once 'controllers/homeController.php';
require_once 'models/homeModel.php';
require_once 'models/accModel.php';
require_once 'controllers/accController.php';

// Lấy id và act từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$act = $_GET['act'] ?? '/';

// Kiểm tra act và gọi đúng controller method
switch ($act) {
    case '/':
        (new homeController())->home();
        break;
    case 'shop':
        (new homeController())->shop();
        break;
    case 'spCart':
        (new homeController())->spCard($id);
        break;
    case 'Cart':
        (new homeModel())->Card();
        break;
    case 'update_quantity':
        (new homeController())->updateQuantity();
        break;
    case 'details':
        if ($id) {
            // Truyền id vào phương thức shop_details
            (new homeController())->shop_details($id);
        } else {
            // Xử lý trường hợp không có id
            echo 'Product ID is missing.';
        }
        break;
    case 'checkout':
        (new homeController())->checkout();
    case 'login':
        (new accController())->login();
    case 'logout':
        (new accController())->logout();
    default:
        // Trường hợp mặc định nếu không có match
        echo 'Page not found.';
        break;
}
