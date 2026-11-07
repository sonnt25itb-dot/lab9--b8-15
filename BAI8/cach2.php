
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 8 - Cách 2</title>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
    <h2>BÀI 8 - CKEDITOR CÁCH 2</h2>

    <form method="post">
        <p>Nội dung thứ nhất:</p>
        <textarea name="tomtat" id="tomtat"></textarea>

        <p>Nội dung thứ hai:</p>
        <textarea name="tomtat1" id="tomtat1"></textarea>

        <p><input type="submit" value="OK"></p>
    </form>

    <script>
        CKEDITOR.replaceAll();
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<h3>Kết quả:</h3>";

        if (isset($_POST['tomtat'])) {
            echo "<pre>" .
                htmlspecialchars($_POST['tomtat'], ENT_QUOTES, 'UTF-8') .
                "</pre>";
        }

        if (isset($_POST['tomtat1'])) {
            echo "<pre>" .
                htmlspecialchars($_POST['tomtat1'], ENT_QUOTES, 'UTF-8') .
                "</pre>";
        }
    }
    ?>
</body>
</html>
