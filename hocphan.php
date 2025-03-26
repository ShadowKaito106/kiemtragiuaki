<?php
require 'connect.php';

// Truy vấn danh sách học phần
$sql = "SELECT * FROM HocPhan";
$result = $conn->query($sql);

// Kiểm tra dữ liệu trả về
$hocPhans = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hocPhans[] = $row;
    }
} else {
    echo "Không có học phần nào!";
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Học Phần</title>
    <link rel="stylesheet" href="Content/css/style.css">
</head>
<body>
    <a href="login.php">
        <button class="login-button">Đăng nhập</button>
    </a>
    <h1>Danh Sách Học Phần</h1>
    <table>
        <tr>
            <th>Mã Học Phần</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($hocPhans as $hocPhan): ?>
        <tr>
            <td><?= $hocPhan['MaHP'] ?></td>
            <td><?= $hocPhan['TenHP'] ?></td>
            <td><?= $hocPhan['SoTinChi'] ?></td>
            <td>
                <a href="dangky.php?MaHP=<?= $hocPhan['MaHP'] ?>" class="btn">Đăng Ký</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
