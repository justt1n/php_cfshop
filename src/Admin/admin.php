<?php

$pdo = new PDO('mysql:host=localhost;dbname=my_database', 'my_username', 'my_password');
$product = new MVC\Models\Product($pdo);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image'])) {
                // Get user input and upload image file
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $image_path = uploadImage($_FILES['image']);

                // Add new product to database
                $product->addProduct($name, $description, $price, $image_path);
            }

            // Redirect back to index.php
            header('Location: index.php');
            exit();
        }

        // Render the add form
        require_once 'views/add_form.php';
        break;

    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image'])) {
                // Get user input and upload image file
                $id = $_POST['id'];
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $image_path = uploadImage($_FILES['image']);

                // Update product in database
                $product->updateProduct($id, $name, $description, $price, $image_path);
            }

            // Redirect back to index.php
            header('Location: index.php');
            exit();
        }

        // Render the edit form
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $product_data = $product->getProductById($id);

        if (!$product_data) {
            // Redirect back to index.php if product not found
            header('Location: index.php');
            exit();
        }

        require_once 'views/edit_form.php';
        break;

    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $product->deleteProduct($id);

        // Redirect back to index.php
        header('Location: index.php');
        exit();

    default:
        // Render the product list
        $product_list = $product->getAllProducts();

        require_once 'views/product_list.php';
        break;
}

function uploadImage($file) {
    if (!isset($file['tmp_name'])) {
        return null;
    }

    $target_dir = 'images/';
    $target_file = $target_dir . basename($file['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file['tmp_name']);

    if ($check === false) {
        return null;
    }

    // Check file size
    if ($file['size'] > 5000000) {
        return null;
    }

    // Allow only certain file formats
    if ($imageFileType !== 'jpg' && $imageFileType !== 'png' && $imageFileType !== 'jpeg' && $imageFileType !== 'gif') {
        return;
    }
}