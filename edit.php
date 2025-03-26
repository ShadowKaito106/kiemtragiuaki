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

// Xử lý cập nhật dữ liệu khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST['MaSV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $Hinh = $_POST['Hinh'];
    $MaNganh = $_POST['MaNganh'];

    $sql = "UPDATE SinhVien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', Hinh='$Hinh', MaNganh='$MaNganh' WHERE MaSV='$MaSV'";

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
    <title>Chỉnh sửa Sinh Viên</title>
    <link rel="stylesheet" type="text/css" href="Content/css/style.css">
</head>
<body>
    <h2>Chỉnh sửa Sinh Viên</h2>
    <form action="edit.php" method="POST">
        <input type="hidden" name="MaSV" value="<?= $row['MaSV'] ?>">
        
        <label>Họ Tên:</label>
        <input type="text" name="HoTen" value="<?= $row['HoTen'] ?>" required><br>
        
        <label>Giới Tính:</label>
        <select name="GioiTinh">
            <option value="Nam" <?= ($row['GioiTinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?= ($row['GioiTinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
        </select><br>
        
        <label>Ngày Sinh:</label>
        <input type="date" name="NgaySinh" value="<?= $row['NgaySinh'] ?>" required><br>
        
        <label>Hình Ảnh (URL):</label>
        <input type="text" name="Hinh" value="<?= $row['Hinh'] ?>"><br>
        
        <label>Mã Ngành:</label>
        <input type="text" name="MaNganh" value="<?= $row['MaNganh'] ?>" required><br>

        <button type="submit">Cập nhật</button>
        <a href="index.php">Quay lại</a>
    </form>
</body>
</html>
