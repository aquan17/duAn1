<?php
require_once "../commons/function.php";
require_once "models/Product.php";
require_once "models/Category.php";
require_once "models/Order.php";
require_once "models/User.php";
require_once "models/Comment.php";
require_once "models/thongke.php";

// require_once "controllers/thongkeController.php";
require_once "controllers/UserController.php";
require_once "controllers/ProductController.php";
require_once "controllers/OrderController.php";
require_once "controllers/CategoryController.php";
require_once "controllers/CommentController.php";

require_once "controllers/dashboardController.php";

$ctl = $_GET['ctl'] ?? "";


match("$ctl") {
    ""=> (new dashboardController)->dashboard(),
    "product-list" => (new ProductController())->list(),
    "product-add" => (new ProductController())->add(),
    "product-store" => (new ProductController())->store(),
    "product-edit" => (new ProductController())->edit(),
    "product-delete" => (new ProductController())->delete(),
    
    "category-list" => (new CategoryController())->list(),
    "category-add" => (new CategoryController())->add(),
    "category-store" => (new CategoryController())->store(),
    "category-edit" => (new CategoryController())->edit(),
    "category-delete" => (new CategoryController())->delete(),

   "order" => (new OrderController())->listOrders(),
    "viewod" => (new OrderController())->viewOrderDetails(),
    "updateStatus" => (new OrderController())->updateOrderStatus(),

    "user-list" => (new UserController())->list(),
    "user-store" => (new UserController())->store(),
    "user-edit" => (new UserController())->edit(),
    "user-delete" => (new UserController())->delete(),

    "comment-list" => (new CommentController())->list(),
    "comment-show" =>(new CommentController())->showComment(),
    "comment-hide" =>(new CommentController())->hideComment(),
    
    default => view('404'),
};
