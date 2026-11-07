
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả CKEditor</title>
</head>
<body>
    <h2>NỘI DUNG ĐÃ GỬI</h2>

    <?php
    if (isset($_POST['tomtat'])) {
        echo "<pre>" .
            htmlspecialchars($_POST['tomtat'], ENT_QUOTES, 'UTF-8') .
            "</pre>";
    } else {
        echo "Chưa có dữ liệu!";
    }
    ?>

    <a href="index.php">Quay lại</a>
</body>
</html>
