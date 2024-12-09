<?php
// Bao gồm file kết nối
include('connect.php');

// Kiểm tra dữ liệu từ form
if (!isset($_POST['id'], $_POST['name'], $_POST['name'])) {
    die("Dữ liệu không hợp lệ!");
}

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];

// Kết nối cơ sở dữ liệu
$conn = getConnection();

// Cập nhật dữ liệu sản phẩm
$sql = "UPDATE sanpham SET Name = ?, Price = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

// Kiểm tra lỗi chuẩn bị câu lệnh
if ($stmt === false) {
    die("Lỗi khi chuẩn bị câu lệnh: " . $conn->error);
}

$stmt->bind_param("sdi", $name, $price, $id);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Cập nhật sản phẩm thành công!";
} else {
    echo "Lỗi khi cập nhật sản phẩm: " . $stmt->error;
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>