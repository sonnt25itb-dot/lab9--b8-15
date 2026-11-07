
<?php
session_start();

$_SESSION['name'] = "Nguyễn Trường Sơn";
$_SESSION['age'] = 19;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 10 - SESSION</title>
</head>
<body>

<h2>BÀI 10 - SESSION TRONG PHP</h2>

<?php
echo "Tên bạn là: " . $_SESSION['name'] . "<br>";
echo "Số tuổi của bạn: " . $_SESSION['age'] . "<br>";
?>

<p>
    <a href="test_session.php">Click here!</a>
</p>

</body>
</html>
