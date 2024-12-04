<?php

$host ='localhost';
$username ='root';
$password ='';
$dbname = 'bth01_CSE485_ex';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn) {
    //echo "Kết nối thành công!";
}
else {
    echo "Kết nối thất bại!";
}


?>