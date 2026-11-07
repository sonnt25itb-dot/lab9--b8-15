
<?php
require "connect.php";

$username = "son";
$password = password_hash("123456", PASSWORD_DEFAULT);
$name = "Nguyễn Trường Sơn";

$sql = "INSERT INTO users
        (Username, Password, name)
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE
        Password = VALUES(Password),
        name = VALUES(name)";

$stmt = mysqli_prepare($connect, $sql);

mysqli_stmt_bind_param(
    $stmt, "sss", $username, $password, $name
);

if (mysqli_stmt_execute($stmt)) {
    echo "Tạo tài khoản thành công!";
} else {
    echo "Có lỗi khi tạo tài khoản!";
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>
