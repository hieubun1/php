<?php
session_start();
// Khởi tạo dữ liệu mẫu cho session nếu chưa có
if (!isset($_SESSION["products"])) {
  $_SESSION["products"] = [
      ["name" => "name", "price" => "price"],
  ];
}

// Gán giá trị từ session vào biến $products
$products = $_SESSION["products"];
?>
<div class="w-75 m-auto py-5">
   <a href="add.html"><button type="button" class="btn btn-success">Add New Product</button></a> 
   <table class="table caption-top">
      <thead>
         <tr>
            <th scope="col">Sản Phẩm</th>
            <th scope="col">Giá thành</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($products as $index => $product) : ?>
            <tr>
               <th scope="row"><?= htmlspecialchars($product["name"]) ?></th>
               <td><?= htmlspecialchars($product["price"]) ?></td>
               <td><a href="edit.php?index=<?= $index ?>"><i class="fa-solid fa-pen-to-square" style="color: #74C0FC;"></i></a></td>
               <td><i class="fa-solid fa-trash" style="color: #74C0FC;"></i></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>
