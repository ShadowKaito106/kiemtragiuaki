<?php
require 'connect.php'; // Kết nối database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maSV = $_POST["MaSV"];
    $maHP = $_POST["MaHP"];
    
    // Kiểm tra xem sinh viên đã đăng ký học phần này chưa
    $check_sql = "SELECT * FROM ChiTietDangKy WHERE MaSV = ? AND MaHP = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ss", $maSV, $maHP);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Chưa đăng ký, tiến hành thêm vào bảng ChiTietDangKy
        $insert_sql = "INSERT INTO ChiTietDangKy (MaSV, MaHP) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("ss", $maSV, $maHP);

        if ($stmt->execute()) {
            echo "Đăng ký học phần thành công!";
        } else {
            echo "Lỗi khi đăng ký học phần!";
        }
    } else {
        echo "Bạn đã đăng ký học phần này!";
    }

    $stmt->close();
}

$conn->close();
?>
