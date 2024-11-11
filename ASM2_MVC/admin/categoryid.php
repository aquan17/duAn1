<?php
require_once 'controllers/productController.php';
require_once 'controllers/categoryController.php';

$productController = new productController();
$categoryController = new categoryController();

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'listproduct':
            $productController->listProduct();
            break;
        case 'insertproduct':
            $productController->insertProduct();
            break;
        case 'updateproduct':
            $productController->updateProduct($_GET['id']);
            break;
        case 'deleteproduct':
            $productController->deleteProduct($_GET['id']);
            break;
        case 'listcategory':
            $categoryController->listCategory();
            break;
        case 'insertcategory':
            $categoryController->insertCategory();
            break;
        case 'updatecategory':
            $categoryController->updateCategory($_GET['id']);
            break;
        case 'deletecategory':
            $categoryController->deleteCategory($_GET['id']);
            break;
        default:
            echo "Invalid action.";
            break;
    }
} else {
    $productController->listProduct();
}
?>
