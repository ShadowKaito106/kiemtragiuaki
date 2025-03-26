<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Test1";

// Kết nối bằng MySQLi
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Đặt charset UTF-8 để hỗ trợ tiếng Việt
$conn->set_charset("utf8");
?>
