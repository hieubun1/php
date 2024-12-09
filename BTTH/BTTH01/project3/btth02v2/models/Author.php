<?php

class Author {
    private $ma_tgia;
    private $ten_tgia;

    public function __construct($ma_tgia, $ten_tgia){
        $this->ma_tgia = $ma_tgia;
        $this->ten_tgia = $ten_tgia;
    }

    public function getMa_tgia(){
        return $this->ma_tgia;
    }

    public function getTen_tgia(){
        return $this->ten_tgia;
    }

    public function setMa_tgia($ma_tgia){
        $this->ma_tgia = $ma_tgia;
    }

    public function setTen_tgia($ten_tgia){
        $this->ten_tgia = $ten_tgia;
    }

    public function addAuthor($conn){
        $sql = "INSERT INTO tacgia(ma_tgia, ten_tgia) VALUES (:ma_tgia, :ten_tgia)";
        $stmt = $conn->prepare($sql);

        // Bind các giá trị vào câu truy vấn
        $stmt->bindParam(':ma_tgia', $this->ma_tgia);
        $stmt->bindParam(':ten_tgia', $this->ten_tgia);
        return $stmt->execute();
    }

    public function updateAuthor($conn){
        $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia WHERE ma_tgia = :ma_tgia";
        $stmt = $conn->prepare($sql);

        // Bind các tham số
        $stmt->bindParam(':ma_tgia', $this->ma_tgia);
        $stmt->bindParam(':ten_tgia', $this->ten_tgia);

        return $stmt->execute();
    }

    public function deleteAuthor($conn){
        $sql = "DELETE FROM tacgia WHERE ma_tgia = :ma_tgia";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_tgia', $this->ma_tgia);
        
        return $stmt->execute();
    }

    

}