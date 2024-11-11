<?php
session_start();
require_once '../commons/function.php';
require_once 'controllers/accController.php';
require_once 'controllers/dashboardController.php';
require_once 'controllers/productController.php';
require_once 'models/productModel.php';
require_once 'models/accModel.php';
require_once 'controllers/categoryController.php';
require_once 'models/categoryModel.php';

// Function to validate ID parameters
function validateId($id) {
    if (!is_numeric($id) || $id <= 0) {
        throw new Exception("Invalid ID parameter");
    }
    return (int)$id;
}

try {
    // Action determination
    $act = $_GET['act'] ?? '/';

    // Authentication check (example for product and category operations)
    if (!in_array($act, ['/', 'logout']) && !isset($_SESSION['user'])) {
        header('Location: ?act=/');
        exit();
    }

    // Match actions with proper controllers and methods
    match($act) {
        '/'                 => (new accController())->login(),
        'logout'            => (new accController())->logout(),
        'home'              => (new dashboardController())->dashboard(),
        'listproduct'       => (new productController())->listProduct(),
        'insertproduct'     => (new productController())->insertProduct(),
        'updateproduct'     => (new productController())->updateProduct(validateId($_GET['id'])),
        'deleteproduct'     => (new productController())->deleteProduct(validateId($_GET['id'])),
        'listcategory'      => (new categoryController())->listCategory(),
        'insertcategory'    => (new categoryController())->insertCategory(),
        'updatecategory'    => (new categoryController())->updateCategory(validateId($_GET['id'])),
        'deletecategory'    => (new categoryController())->deleteCategory(validateId($_GET['id'])),
        default             => fn() => throw new Exception("Invalid action"),
    };
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
