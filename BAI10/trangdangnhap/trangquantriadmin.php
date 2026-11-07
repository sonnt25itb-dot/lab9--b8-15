
<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: dangnhap.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang quản trị</title>
</head>
<body>
    <h2>TRANG QUẢN TRỊ ADMIN</h2>

    <p>
        Xin chào:
        <strong>
            <?php
            echo htmlspecialchars(
                $_SESSION["name"],
                ENT_QUOTES,
                "UTF-8"
            );
            ?>
        </strong>
    </p>

    <p>Bạn đã đăng nhập thành công!</p>

    <a href="dangxuat.php">Đăng xuất</a>
</body>
</html>
