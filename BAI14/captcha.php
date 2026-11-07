
<?php
session_start();

// Tao ma CAPTCHA 6 ky tu
$string = substr(bin2hex(random_bytes(3)), 0, 6);

// Luu vao SESSION
$_SESSION['captcha'] = $string;

// Tao hinh anh
$img = imagecreate(150, 50);

// Mau nen den
imagecolorallocate($img, 0, 0, 0);

// Mau chu trang
$white = imagecolorallocate($img, 255, 255, 255);

// Viet ma CAPTCHA
imagestring($img, 4, 40, 15, $string, $white);

// Xoa output buffer neu co
while (ob_get_level() > 0) {
    ob_end_clean();
}

// Xuat anh PNG
header("Content-Type: image/png");
header("Cache-Control: no-store, no-cache, must-revalidate");

imagepng($img);
imagedestroy($img);
