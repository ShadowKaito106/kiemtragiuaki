<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST['MaSV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $Hinh = $_POST['Hinh']; 
    $MaNganh = $_POST['MaNganh'];

    $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
            VALUES ('$MaSV', '$HoTen', '$GioiTinh', '$NgaySinh', '$Hinh', '$MaNganh')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <link rel="stylesheet" type="text/css" href="Content/css/style.css">
</head>
<body>
    <h2>Thêm Sinh Viên</h2>
    <form action="create.php" method="POST">
        <label>Mã SV:</label>
        <input type="text" name="MaSV" required><br>
        
        <label>Họ Tên:</label>
        <input type="text" name="HoTen" required><br>
        
        <label>Giới Tính:</label>
        <select name="GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br>
        
        <label>Ngày Sinh:</label>
        <input type="date" name="NgaySinh" required><br>
        
        <label>Hình Ảnh (URL):</label>
        <input type="text" name="Hinh"><br>
        
        <label>Mã Ngành:</label>
        <input type="text" name="MaNganh" required><br>

        <button type="submit">Thêm</button>
        <a href="index.php">Quay lại</a>
    </form>
</body>
</html>
