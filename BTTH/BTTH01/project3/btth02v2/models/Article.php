<?php
class Article{
    // Thuộc tính
    private $ma_bviet;
    private $tieude;
    private $ten_bhat;
    private $ma_tloai;
    private $tomtat;
    private $noidung;
    private $ma_tgia;
    private $ngayviet;
    private $hinhanh;


    public function __construct($ma_bviet,$tieude, $ten_bhat, $ma_tgia, $ma_tloai,  $tomtat, $noidung, $ngayviet, $hinhanh){    
        $this->ma_bviet = $ma_bviet;
        $this->tieude = $tieude;
        $this->ten_bhat = $ten_bhat;
        $this->ma_tgia = $ma_tgia;
        $this->ma_tloai = $ma_tloai;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->ngayviet = $ngayviet;
        $this->hinhanh = $hinhanh;
    }

    // Setter và Getter

    public function getMa_bviet(){
        return $this->ma_bviet;
    }
    public function getTieude(){
        return $this->tieude;
    }
    public function getHinhanh(){
        return $this->hinhanh;
    }
    public function getTen_bhat(){
        return $this->ten_bhat;
    }
    public function getTomtat(){
        return $this->tomtat;
    }
    public function getMa_tloai(){
        return $this->ma_tloai;
    }
    public function getNoidung(){
        return $this->noidung;
    }
    public function getMa_tgia(){
        return $this->ma_tgia;
    }
    public function getNgayviet(){
        return $this->ngayviet;
    }
    public function setMa_bviet($ma_bviet){
        $this->ma_bviet = $ma_bviet;
    }
    public function setTieude($tieude){
        $this->tieude = $tieude;
    }
    public function setHinhanh($hinhanh){
        $this->hinhanh = $hinhanh;
    }
    public function setTen_bhat($ten_bhat){
        $this->ten_bhat = $ten_bhat;
    }
    public function setTomtat($tomtat){
        $this->tomtat = $tomtat;
    }
    public function setMa_tloai($ma_tloai){
        $this->ma_tloai = $ma_tloai;
    }
    public function setNoidung($noidung){
        $this->noidung = $noidung;
    }
    public function setMa_tgia($ma_tgia){
        $this->ma_tgia = $ma_tgia;
    }
    public function setNgayviet($ngayviet){
        $this->ngayviet = $ngayviet;
    }

    public function addArticle($conn){
        $sql = "INSERT INTO baiviet(ma_bviet, tieude, ten_bhat, ma_tgia, ma_tloai, tomtat) VALUES (:ma_bviet, :tieude, :ten_bhat, :ma_tgia, :ma_tloai, :tomtat)";
        $stmt = $conn->prepare($sql);

        // Bind các giá trị vào câu truy vấn
        $stmt->bindParam(':ma_bviet', $this->ma_bviet);
        $stmt->bindParam(':tieude', $this->tieude);
        $stmt->bindParam(':ten_bhat', $this->ten_bhat);
        $stmt->bindParam(':ma_tgia', $this->ma_tgia);
        $stmt->bindParam(':ma_tloai', $this->ma_tloai);
        $stmt->bindParam(':tomtat', $this->tomtat);
        return $stmt->execute();

    }
    public function updateArticle($conn){
        $sql = "UPDATE baiviet SET tieude = :tieude, ten_bhat = :ten_bhat, ma_tgia = :ma_tgia, ma_tloai = :ma_tloai, tomtat = :tomtat WHERE ma_bviet = :ma_bviet";
        $stmt = $conn->prepare($sql);

        // Bind các tham số
        $stmt->bindParam(':ma_bviet', $this->ma_bviet);
        $stmt->bindParam(':tieude', $this->tieude);
        $stmt->bindParam(':ten_bhat', $this->ten_bhat);
        $stmt->bindParam(':ma_tgia', $this->ma_tgia);
        $stmt->bindParam(':ma_tloai', $this->ma_tloai);
        $stmt->bindParam(':tomtat', $this->tomtat);
        return $stmt->execute();
    }

    public function deleteArticle($conn){
        $sql = "DELETE FROM baiviet WHERE ma_bviet = :ma_bviet";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_bviet', $this->ma_bviet);
        return $stmt->execute();

    }

    
    
}