<?php
require_once("configs/DBConnection.php");
include("models/Author.php");

class AuthorService{

    public function countAuthor()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql_tgia = "SELECT COUNT(ma_tgia) as count_tacgia FROM tacgia";
        $stmt = $conn->query($sql_tgia);

        // Sử dụng fetch() với PDO để lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count_tacgia'];
    }

    public function getAllAuthors()
    {
        // Kết nối cơ sở dữ liệu
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT ma_tgia, ten_tgia FROM tacgia";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $authors = [];

        $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Mảng (danh sách) các đối tượng Author Model

        return $authors;
    }

    public function addAuthor($ma_tgia, $ten_tgia) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Tạo đối tượng tác giả mới
        $author = new Author($ma_tgia, $ten_tgia);

        // Thêm tác giả vào database
        if ($author->addAuthor($conn)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateAuthor($ma_tgia, $ten_tgia) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Tạo đối tượng tác giả mới
        $author = new Author($ma_tgia, $ten_tgia);

        // Cập nhật tác giả vào database
        return ($author->updateAuthor($conn)) ;
    }
    public function getAuthorById($ma_tgia) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM tacgia WHERE ma_tgia = :ma_tgia";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_tgia', $ma_tgia);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteAuthor($ma_tgia) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Tạo đối tượng tác giả mới
        $author = new Author($ma_tgia, "");

        // Xóa tác giả khỏi database
        return $author->deleteAuthor($conn);
    }
}