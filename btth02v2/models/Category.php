<?php

class Category{
    private $ma_tloai;
    private $ten_tloai;

    public function __construct($ma_tloai, $ten_tloai){
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
    }

    public function getMa_tloai(){
        return $this->ma_tloai;
    }

    public function getTen_tloai(){
        return $this->ten_tloai;
    }

    public function setMa_tloai($ma_tloai){
        $this->ma_tloai = $ma_tloai;
    }

    public function setTen_tloai($ten_tloai){
        $this->ten_tloai = $ten_tloai;
    }

    public function addCategory($conn) {
        $sql = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (:ma_tloai, :ten_tloai)";
        $stmt = $conn->prepare($sql);

        // Bind các giá trị vào câu truy vấn
        $stmt->bindParam(':ma_tloai', $this->ma_tloai);
        $stmt->bindParam(':ten_tloai', $this->ten_tloai);

        // Thực thi câu truy vấn
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateCategory($conn) {
        $sql = "UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai";
        $stmt = $conn->prepare($sql);
        
        // Bind các tham số
        $stmt->bindParam(':ten_tloai', $this->ten_tloai);
        $stmt->bindParam(':ma_tloai', $this->ma_tloai);

        return $stmt->execute();
    }
    public function deleteCategory($conn) {
        $sql = "DELETE  FROM theloai WHERE ma_tloai = :ma_tloai";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_tloai', $this->ma_tloai);

        return $stmt->execute();
    }
}
?>