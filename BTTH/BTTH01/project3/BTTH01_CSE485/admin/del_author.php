<?php
include 'connect.php';

$ma_tgia = $_GET['ma_tgia'];

// Xoa tac gia tu co so du lieu
$sql = "DELETE FROM tacgia WHERE ma_tgia = '$ma_tgia'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: author.php"); // Xu ly xong quay ve trang danh sach tac gia
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>