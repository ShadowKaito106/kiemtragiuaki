<?php
include 'connect.php';

// Lấy danh sách sinh viên từ database
$sql = "SELECT * FROM SinhVien";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sinh Viên</title>
    <link rel="stylesheet" type="text/css" href="Content/css/style.css">
</head>
<body>
    <h2>Danh sách Sinh Viên</h2>
    <a href="create.php">Thêm Sinh Viên</a>
    <table border="1">
        <tr>
            <th>Mã SV</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Hình</th>
            <th>Mã Ngành</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['MaSV']) ?></td>
            <td><?= htmlspecialchars($row['HoTen']) ?></td>
            <td><?= htmlspecialchars($row['GioiTinh']) ?></td>
            <td><?= htmlspecialchars($row['NgaySinh']) ?></td>
            <td>
                <?php if (!empty($row['Hinh'])): ?>
                    <img src="<?= htmlspecialchars($row['Hinh']) ?>" width="80" height="80">
                <?php else: ?>
                    <img src="Content/images/sv1.jpg" width="80" height="80">
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($row['MaNganh']) ?></td>
            <td>
                <a href="detail.php?MaSV=<?= $row['MaSV'] ?>">Xem</a> |
                <a href="edit.php?MaSV=<?= $row['MaSV'] ?>">Sửa</a> |
                <a href="delete.php?MaSV=<?= $row['MaSV'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
