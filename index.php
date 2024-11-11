<?php
session_start();
session_destroy();

require_once 'commons/function.php';
require_once 'controllers/homeController.php';
require_once 'models/homeModel.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$act = $_GET['act'] ?? '/';

match($act) {
    '/' => (new homeController())->home(),
    'shop' => (new homeController())->shop(),
    'spCart' => (new homeController())->spCard($id),
};

?>
