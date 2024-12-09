<?php
$host ='127.0.0.1';
$username ='root';
$password ='';
$dbname = 'bth01_CSE485_ex';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    //echo "Kết nối thành công!";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


function getTheLoai(){
    global $pdo;
    $stmt = $pdo->query("SELECT ma_tloai, ten_tloai FROM theloai");
    return $stmt->fetchAll();

}
function getTacGia(){
    global $pdo;
    $stmt = $pdo->query("SELECT ma_tgia, ten_tgia FROM tacgia");
    return $stmt->fetchAll();

}
function getBaiViet(){
    global $pdo;
    $stmt = $pdo->query("SELECT ma_bviet, tieude, ten_tgia, ten_bhat,ten_tloai, tomtat FROM baiviet
                        LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
                        LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                        ");
    return $stmt->fetchAll();
}

?>

