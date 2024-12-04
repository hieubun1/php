<?php
// Kết nối đến cơ sở dữ liệu
include("connect.php");
// $conn->connect();
$conn = getConnection();
// Viết truy vấn SQL
$sql = "SELECT * FROM sanpham";

// Thực thi truy vấn
$result = $conn->query($sql);
$products = [];

// Kiểm tra có dữ liệu hay không
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
        // echo "Name: " . $row["Name"] . " - Price: " . $row["Price"] . "<br>";

    }
} else {
    echo "No records have been found.";
}

// Đóng kết nối
$conn->close();
?>
