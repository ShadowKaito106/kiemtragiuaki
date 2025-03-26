<?php
require 'connect.php'; // Kết nối database
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maSV = $_POST["MaSV"];

    // Kiểm tra sinh viên có tồn tại không
    $sql = "SELECT * FROM SinhVien WHERE MaSV = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $maSV);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Sinh viên tồn tại -> lưu session
        $_SESSION["MaSV"] = $maSV;
        echo "Đăng nhập thành công! <a href='hocphan.php'>Về trang chủ</a>";
    } else {
        echo "Mã sinh viên không tồn tại!";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="Content/css/style.css">
</head>
<body>
    <h1>Đăng Nhập</h1>
    <form method="POST">
        <label for="MaSV">Mã SV:</label>
        <input type="text" name="MaSV" required>
        <input type="submit" value="Đăng Nhập">
    </form>
</body>
</html>