<?php
// session_start();
include("./products.php");
// Lấy danh sách sản phẩm từ session
// $products = isset($_SESSION["products"]) ? $_SESSION["products"] : [];
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
         <?php if (!empty($products)) : ?>
            <?php foreach ($products as $index => $product) : ?>
               <tr>
                  <th scope="row"><?= htmlspecialchars($product["Name"]) ?></th>
                  <td><?= htmlspecialchars($product["Price"]) ?></td>
                  <td>
                     <a href="edit.php?index=<?= $product["id"] ?>">
                        <i class="fa-solid fa-pen-to-square" style="color: #74C0FC;"></i>
                     </a>
                  </td>
                  <td>
                     <a href="delete.php?index=<?= $product["id"] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                        <i class="fa-solid fa-trash" style="color: #74C0FC;"></i>
                     </a>
                  </td>
               </tr>
            <?php endforeach; ?>
         <?php else : ?>
            <tr>
               <td colspan="4" class="text-center">Không có sản phẩm nào.</td>
            </tr>
         <?php endif; ?>
      </tbody>
   </table>
</div>

