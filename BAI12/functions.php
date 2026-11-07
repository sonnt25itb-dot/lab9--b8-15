
<?php
// Kết nối database rating
$conn = mysqli_connect(
    "127.0.0.1",
    "root",
    "",
    "rating",
    3306
);

if (!$conn) {
    die("Không thể kết nối CSDL: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

// Hàm lấy thông tin đánh giá của sản phẩm
function getRatingInfo($id) {
    global $conn;

    $id = (int)$id;

    $query = "SELECT * FROM rating_info
              WHERE product_id = $id";

    $result = mysqli_query($conn, $query);

    $return = '<h3>Thông tin đánh giá</h3>';
    $return .= '<ul id="rating-info">';

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        for ($i = 5; $i >= 1; $i--) {
            $return .= '<li>' . $i . ' sao: '
                     . (int)$row['rate_' . $i]
                     . ' lượt</li>';
        }
    } else {
        for ($i = 5; $i >= 1; $i--) {
            $return .= '<li>' . $i . ' sao: 0 lượt</li>';
        }
    }

    $return .= '</ul>';

    return $return;
}

// Hàm cập nhật lượt đánh giá
function setRatingInfo($id, $rate) {
    global $conn;

    $id = (int)$id;
    $rate = (int)$rate;

    if ($id <= 0 || $rate < 1 || $rate > 5) {
        return false;
    }

    // Chỉ cho phép cập nhật cột rate_1 đến rate_5
    $column = "rate_" . $rate;

    $query = "UPDATE rating_info
              SET $column = $column + 1
              WHERE product_id = $id";

    return mysqli_query($conn, $query);
}

// Hàm lấy chi tiết một sản phẩm
function getProduct($id) {
    global $conn;

    $id = (int)$id;

    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        return "<p>Không tìm thấy sản phẩm!</p>";
    }

    $row = mysqli_fetch_assoc($result);

    $title = htmlspecialchars(
        $row['title'],
        ENT_QUOTES,
        'UTF-8'
    );

    $img = htmlspecialchars(
        $row['img_url'],
        ENT_QUOTES,
        'UTF-8'
    );

    $rating_info = getRatingInfo($id);

    $return = '<div id="product-img">
                  <img src="' . $img . '" alt="' . $title . '">
               </div>';

    $return .= $rating_info;
    $return .= '<div class="clear-fx"></div>';
    $return .= '<h2>' . $title . '</h2>';

    return $return;
}

// Hàm lấy danh sách tất cả sản phẩm
function listProduct() {
    global $conn;

    $query = "SELECT * FROM products ORDER BY id ASC";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "<p>Lỗi lấy danh sách sản phẩm!</p>";
    }

    $return = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $id = (int)$row['id'];

        $title = htmlspecialchars(
            $row['title'],
            ENT_QUOTES,
            'UTF-8'
        );

        $img = htmlspecialchars(
            $row['img_url'],
            ENT_QUOTES,
            'UTF-8'
        );

        $rating_info = getRatingInfo($id);

        $return .= '<div class="product-info">';

        $return .= '<div id="product-img">
                        <img src="' . $img . '" alt="' . $title . '">
                    </div>';

        $return .= $rating_info;

        $return .= '<div class="clear-fx"></div>';

        $return .= '<h2>
                        <a href="index.php?id=' . $id . '">'
                        . $title .
                        '</a>
                    </h2>';

        $return .= '</div>';
    }

    return $return;
}
?>

