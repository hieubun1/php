<?php
// Tạo mảng cố định để lưu trữ sản phẩm
include("products.php");

// Lấy thông tin từ form
$name = $_POST['name']??"";
$price = $_POST['price']??"";
$description = $_POST['description']??"";

// Thêm sản phẩm mới vào mảng
$newProduct = ['name' => $name, 'price' => $price, 'description' => $description];
$products[] = $newProduct;

session_start();
$_SESSION["products"] = $products;


?>


