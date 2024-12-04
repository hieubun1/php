<?php
require_once("configs/DBConnection.php");
include("models/Article.php");
class ArticleService
{
    public function getTopArticles()
    {
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT ma_bviet, hinhanh, tieude FROM baiviet";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }

    public function getArticleById($ma_bviet) {
        // Kết nối cơ sở dữ liệu
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn bài viết dựa trên mã bài viết
        $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.noidung, baiviet.tomtat, baiviet.ten_bhat, baiviet.hinhanh, 
                       theloai.ten_tloai, tacgia.ten_tgia 
                FROM baiviet 
                LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai 
                LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
                WHERE baiviet.ma_bviet = :ma_bviet";

        // B3. Chuẩn bị và thực thi câu lệnh
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_bviet', $ma_bviet, PDO::PARAM_INT);
        $stmt->execute();

        // B4. Lấy kết quả
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        // Trả về bài viết nếu có, nếu không trả về null
        return $article ? new Article(
            $article['ma_bviet'],
            $article['tieude'],
            $article['ten_bhat'],
            $article['ten_tgia'],
            $article['ten_tloai'],
            $article['tomtat'],
            $article['noidung'],
            null,
            $article['hinhanh']
        ) : null;
    }

    public function countArticle()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql_bviet = "SELECT COUNT(ma_bviet) as count_baiviet FROM baiviet";
        $stmt = $conn->query($sql_bviet);

        // Sử dụng fetch() với PDO để lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count_baiviet'];
    }

    public function getAllArticles()
    {
        // Kết nối cơ sở dữ liệu
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.noidung, baiviet.tomtat, 
                baiviet.ten_bhat, baiviet.hinhanh, theloai.ten_tloai, tacgia.ten_tgia 
        FROM baiviet 
        LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai 
        LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia";
        $stmt = $conn->query($sql);


        // B3. Xử lý kết quả
        $articles = [];

        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }


    public function addArticle($ma_bviet, $tieude, $ten_bhat, $ma_tgia, $ma_tloai, $tomtat) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Tạo đối tượng bài viết mới
        $article = new Article($ma_bviet, $tieude, $ten_bhat, $ma_tgia, $ma_tloai,  $tomtat, null, null, null);

        // Thêm bài viết vào database
        if ($article->addArticle($conn)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateArticle($ma_bviet, $tieude, $ten_bhat, $ma_tgia, $ma_tloai, $tomtat) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Tạo đối tượng bài viết mới
        $article = new Article($ma_bviet, $tieude, $ten_bhat, $ma_tgia, $ma_tloai,  $tomtat, null, null, null);

        // Cập nhật bài viết vào database
        return $article->updateArticle($conn);
    }
    public function getArticlesById($ma_bviet) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM baiviet WHERE ma_bviet = :ma_bviet";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_bviet', $ma_bviet, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }



    public function delArticle($ma_bviet) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Tạo đối tượng bài viết mới
        $article = new Article($ma_bviet, null, null, null, null, null, null, null, null);

        // Xóa bài viết khỏi database
        return $article->deleteArticle($conn);

    }
}
