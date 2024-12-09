<?php
include 'connect.php';

$ma_bviet = $_GET['ma_bviet'];

// Xoa bai viet tu co so du lieu
$sql = "DELETE FROM baiviet WHERE ma_bviet = '$ma_bviet'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: article.php"); // Xu ly xong quay ve trang danh sach bai viet
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>