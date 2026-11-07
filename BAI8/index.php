
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 8 - CKEditor</title>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
    <h2>BÀI 8 - SỬ DỤNG CKEDITOR</h2>

    <form action="ketqua.php" method="post">
        <p>Nhập nội dung:</p>

        <textarea name="tomtat" id="tomtat"></textarea>

        <script>
            CKEDITOR.replace('tomtat');
        </script>

        <p>
            <input type="submit" value="OK">
        </p>
    </form>
</body>
</html>
