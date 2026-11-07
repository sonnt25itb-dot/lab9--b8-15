
<?php
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đếm SESSION</title>
</head>
<body>

<h2>ĐẾM SỐ LẦN TRUY CẬP</h2>

<?php
echo "Số lần truy cập: " . $_SESSION['count'];
?>

<p><a href="tang.php">Next</a></p>

</body>
</html>
