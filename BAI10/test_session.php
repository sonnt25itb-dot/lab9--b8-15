
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra SESSION</title>
</head>
<body>

<h2>KIỂM TRA SESSION</h2>

<?php
if (isset($_SESSION['name'], $_SESSION['age'])) {
    echo "Chào bạn " . $_SESSION['name'];
    echo " có tuổi là: " . $_SESSION['age'];
} else {
    echo "SESSION chưa được khởi tạo!";
}
?>

<br><br>
<a href="huy_session.php">Hủy SESSION</a>

</body>
</html>
