
<?php
session_start();

// Xóa biến SESSION name
unset($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hủy SESSION</title>
</head>
<body>

<h2>KẾT QUẢ HỦY SESSION</h2>

<?php
if (isset($_SESSION['name'])) {
    echo "Tên: " . $_SESSION['name'];
} else {
    echo "Biến SESSION name đã bị xóa!";
}

echo "<br>";

if (isset($_SESSION['age'])) {
    echo "Tuổi vẫn còn: " . $_SESSION['age'];
}
?>

<p><a href="session.php">Quay lại</a></p>

</body>
</html>
