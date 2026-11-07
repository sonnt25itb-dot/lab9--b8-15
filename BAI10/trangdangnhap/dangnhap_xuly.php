
<?php
session_start();
require "connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: dangnhap.php");
    exit;
}

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

$sql = "SELECT id, Username, Password, name
        FROM users WHERE Username = ?";

$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result(
    $stmt, $id, $dbUser, $dbPassword, $name
);

if (mysqli_stmt_fetch($stmt) &&
    password_verify($password, $dbPassword)) {

    session_regenerate_id(true);

    $_SESSION["user_id"] = $id;
    $_SESSION["username"] = $dbUser;
    $_SESSION["name"] = $name;

    header("Location: trangquantriadmin.php");
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($connect);

echo "Sai tài khoản hoặc mật khẩu!";
echo "<br><a href='dangnhap.php'>Quay lại</a>";
?>
