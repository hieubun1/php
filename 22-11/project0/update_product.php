<?php
// Mảng sản phẩm cố định
include("products.php");

// Lấy dữ liệu từ form
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];


// Cập nhật thông tin sản phẩm

$productToEdit = $products[$id];
$productToEdit["name"] = $name;
$productToEdit["price"] = $price;
$products[$id] = $productToEdit;

// Hiển thị danh sách sản phẩm sau khi cập nhật
echo "<h1>Danh sách sản phẩm sau khi cập nhật</h1>";
echo "<ul>";
foreach ($products as $product) {
    echo "<li>";
    echo "Tên: " . $product['name'] . "<br>";
    echo "Giá: " . $product['price'] . " VND<br>";
    echo "</li><br>";
}
echo "</ul>";

echo "<a href='product_list.php'>Quay lại danh sách sản phẩm</a>";

session_start();
$_SESSION["products"] = $products;
?>
