<?php
include("connect.php");
$conn = getConnection();
$id = $_GET['index'];

$sql = 'DELETE FROM  sanpham WHERE id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
if($stmt->num_rows > 0) {echo "Xoá sản phẩm thành công";}
else echo "Xoá sản phẩm thất bại";
$conn->close();
header("Location:index.php");

