
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - Bài 10</title>
</head>
<body>
    <h2>ĐĂNG NHẬP HỆ THỐNG</h2>

    <form action="dangnhap_xuly.php" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" required>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="login">Login</button>
                    <button type="reset">Cancel</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
