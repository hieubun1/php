<?php
require_once("configs/DBConnection.php");
include("models/Category.php");

class CategoryService
{

    public function countCategory()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql_theloai = "SELECT COUNT(ma_tloai) as count_theloai FROM theloai";
        $stmt = $conn->query($sql_theloai);

        // Sử dụng fetch() với PDO để lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count_theloai'];

    }

    public function getAllCategories()
    {
        // Kết nối cơ sở dữ liệu
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT ma_tloai, ten_tloai FROM theloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $categories = [];

        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Mảng (danh sách) các đối tượng Category Model

        return $categories;
    }


    public function addCategory($ma_tloai, $ten_tloai) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Tạo đối tượng thể loại mới
        $category = new Category($ma_tloai, $ten_tloai);

        // Thêm thể loại vào database
        if ($category->addCategory($conn)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCategory($ma_tloai, $ten_tloai) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Tạo đối tượng thể loại với mã thể loại và tên thể loại
        $category = new Category($ten_tloai, $ma_tloai);

        // Cập nhật thông tin thể loại
        return $category->updateCategory($conn);
    }
    public function getCategoryById($ma_tloai) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM theloai WHERE ma_tloai = :ma_tloai";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_tloai', $ma_tloai);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteCategory($ma_tloai) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Tạo đối tượng thể loại
        $category = new Category($ma_tloai, '');

        // Xóa thể loại
        return $category->deleteCategory($conn);
    }
}
