
<?php
require_once "functions.php";

// Kiểm tra người dùng có chọn sản phẩm không
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id && $id > 0) {

    // Nếu người dùng nhấn nút đánh giá
    if (isset($_POST['rate_submit'])) {

        $rate = filter_input(
            INPUT_POST,
            'rate',
            FILTER_VALIDATE_INT
        );

        if ($rate && $rate >= 1 && $rate <= 5) {
            setRatingInfo($id, $rate);

            // Chuyển trang để tránh cộng lượt khi F5
            header("Location: index.php?id=" . $id);
            exit;
        }
    }

    // Lấy chi tiết sản phẩm
    $html = getProduct($id);

    // Hiển thị trang đánh giá
    include "template/view-product.php";

} else {

    // Lấy danh sách sản phẩm
    $html = listProduct();

    // Hiển thị trang danh sách
    include "template/list-products.php";
}
?>
