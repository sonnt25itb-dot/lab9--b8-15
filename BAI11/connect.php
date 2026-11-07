
<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "phantrang";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database,
    3306
);

if (!$conn) {
    die("Lỗi kết nối MySQL: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
?>
