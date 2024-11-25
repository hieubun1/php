<?php
// Mảng sản phẩm cố định
include("products.php");
// Lấy ID sản phẩm cần sửa
$index = $_GET["index"];

// Tìm sản phẩm cần sửa
$productToEdit = $products[$index];
if(!isset($productToEdit)){
    die("Không tìm thấy sản phẩm!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
</head>
<body>
    <h1>Sửa Sản Phẩm</h1>
    <form action="update_product.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $index; ?>">

        <label for="name">Tên sản phẩm:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $productToEdit['name']; ?>" required><br><br>

        <label for="price">Giá sản phẩm:</label><br>
        <input type="number" id="price" name="price" value="<?= $productToEdit['price']; ?>" required><br><br>

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
