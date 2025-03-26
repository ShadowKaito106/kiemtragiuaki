<?php
include 'connect.php';

// Kiểm tra nếu có tham số MaSV được truyền vào
if (isset($_GET['MaSV'])) {
    $MaSV = $_GET['MaSV'];

    // Lấy thông tin sinh viên từ database
    $sql = "SELECT * FROM SinhVien WHERE MaSV = '$MaSV'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Sinh Viên</title>
    <link rel="stylesheet" type="text/css" href="Content/css/style.css">
</head>
<body>
    <h2>Chi tiết Sinh Viên</h2>
    <p><strong>Mã SV:</strong> <?= $row['MaSV'] ?></p>
    <p><strong>Họ Tên:</strong> <?= $row['HoTen'] ?></p>
    <p><strong>Giới Tính:</strong> <?= $row['GioiTinh'] ?></p>
    <p><strong>Ngày Sinh:</strong> <?= $row['NgaySinh'] ?></p>
    <p><strong>Hình:</strong> <img src="<?= $row['Hinh'] ?>" width="100"></p>
    <p><strong>Mã Ngành:</strong> <?= $row['MaNganh'] ?></p>
    <a href="index.php">Quay lại</a>
</body>
</html>
