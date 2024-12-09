<?php
include 'connect.php';

$ma_tloai = $_GET['ma_tloai'];

// Xoa the loai tu co so du lieu
$sql = "DELETE FROM theloai WHERE ma_tloai = '$ma_tloai'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: category.php"); // Xu ly xong quay ve trang danh sach the loai
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>