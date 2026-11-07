
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 9 - Upload hình ảnh</title>
</head>
<body>

<h2>BÀI 9 - UPLOAD HÌNH ẢNH TRONG PHP</h2>

<form action="" method="post"
      enctype="multipart/form-data">

    <input type="hidden" name="MAX_FILE_SIZE"
           value="5000000">

    <label>Chọn hình ảnh:</label>
    <input type="file" name="ufile"
           accept=".jpg,.gif" required>

    <p>
        <input type="submit" name="upload"
               value="Upload">
    </p>
</form>

<?php
if (isset($_FILES['ufile'])) {

    $file = $_FILES['ufile'];
    $target_path = __DIR__ . "/uploads/";

    if ($file['error'] != UPLOAD_ERR_OK) {
        echo "Upload thất bại! Mã lỗi: " .
             $file['error'];
    }
    elseif ($file['size'] > 5000000) {
        echo "File vượt quá 5MB!";
    }
    else {
        $filename = basename($file['name']);
        $extension = strtolower(
            pathinfo($filename, PATHINFO_EXTENSION)
        );

        $target_file = $target_path . $filename;

        if ($extension != "jpg" &&
            $extension != "gif") {

            echo "Không phải file ảnh JPG hoặc GIF!";
        }
        elseif (@getimagesize($file['tmp_name']) === false) {
            echo "File không phải hình ảnh hợp lệ!";
        }
        elseif (file_exists($target_file)) {

            echo "File đã tồn tại!";
        }
        elseif (move_uploaded_file(
            $file['tmp_name'], $target_file
        )) {

            echo "Upload thành công: " .
                 htmlspecialchars(
                     $filename, ENT_QUOTES, 'UTF-8'
                 );
        }
        else {
            echo "Có lỗi xảy ra khi upload!";
        }
    }
}
?>

</body>
</html>
