<?php
session_start();

require_once 'config.php';
require_once 'model/Product.php';
require_once 'controller/ProductController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$product_controller = new ProductController();

switch ($action) {
    case 'add':
        $product_controller->add();
        break;
    case 'edit':
        $product_controller->edit();
        break;
    case 'delete':
        $product_controller->delete();
        break;
    default:
        $product_controller->list();
        break;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Admin Panel</title>
</head>
<body>
    <h1>Product Admin Panel</h1>
    <?php include 'product_list.php'; ?>
</body>
</html>


