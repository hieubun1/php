<?php
// Bao gồm file kết nối
include('connect.php');

// Kiểm tra xem tham số 'id' có tồn tại trong URL không
if (!isset($_GET['index'])) {
    die("ID sản phẩm không hợp lệ!");
}

$id = $_GET['index']; // Lấy id từ URL

// Kết nối cơ sở dữ liệu
$conn = getConnection();

// Lấy thông tin sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM sanpham WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra nếu sản phẩm tồn tại
if ($result->num_rows > 0) {
    $productToEdit = $result->fetch_assoc();
} else {
    die("Không tìm thấy sản phẩm!");
}



$stmt->close();
$conn->close();
// header("Location: index.php")
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
        <input type="hidden" name="id" value="<?php echo $productToEdit['id']; ?>">

        <label for="name">Tên sản phẩm:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $productToEdit['Name']; ?>" required><br><br>

        <label for="price">Giá sản phẩm:</label><br>
        <input type="number" id="price" name="price" value="<?php echo $productToEdit['Price']; ?>" required><br><br>

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
