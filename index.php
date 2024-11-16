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
            (new homeController())->shop_details($id);
        } else {
            echo 'Product ID is missing.';
        }
        break;
    case 'checkout':
        (new homeController())->checkout();
        break;
    case 'login':
        (new accController())->login();
        break;
    case 'logout':
        (new accController())->logout();
        break;
    case 'insertUser':
        (new accController())->insertUser();
        break;
    default:
        echo 'Page not found.';
        break;
}
?>

