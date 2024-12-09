<?php
session_start();
include("connect.php"); // Đảm bảo include file chứa hàm getConnection()

// Lấy kết nối
$conn = getConnection();

// Kiểm tra nếu kết nối thành công
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['Name'] ?? "";
$price = $_POST['Price'] ?? "";

// Chuẩn bị truy vấn
$stmt = $conn->prepare("INSERT INTO `sanpham` (`Name`, `Price`) VALUES (?, ?)");
if ($stmt) {
    $stmt->bind_param("si", $name, $price);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Thêm sản phẩm thành công!";
    } else {
        echo "Không thể thêm sản phẩm: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
