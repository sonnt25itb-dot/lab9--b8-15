
<?php
require_once "connect.php";

// Lấy trang hiện tại
$page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);

if (!$page || $page < 1) {
    $page = 1;
}

// Mỗi trang hiển thị 10 tin tức
$limit = 10;

// Đếm tổng số tin tức
$sqlCount = "SELECT COUNT(*) AS total FROM tintuc";
$resultCount = mysqli_query($conn, $sqlCount);
$rowCount = mysqli_fetch_assoc($resultCount);

$total = (int)$rowCount['total'];

// Tính tổng số trang
$totalPages = max(1, (int)ceil($total / $limit));
$page = min($page, $totalPages);

// Tính vị trí bắt đầu
$start = ($page - 1) * $limit;

// Lấy dữ liệu theo trang
$sql = "SELECT * FROM tintuc
        ORDER BY id ASC
        LIMIT $start, $limit";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 11 - Phân trang PHP</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f5f9;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #1e3a8a;
        }

        .container {
            width: 80%;
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #2563eb;
            color: white;
        }

        tr:nth-child(even) {
            background: #f1f5f9;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 10px 15px;
            margin: 4px;
            border: 1px solid #2563eb;
            border-radius: 5px;
            text-decoration: none;
            color: #2563eb;
        }

        .pagination a.active {
            background: #2563eb;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>BÀI 11 - PHÂN TRANG TRONG PHP</h2>

    <p>Tổng số tin tức: <?php echo $total; ?></p>

    <table>
        <tr>
            <th>ID</th>
            <th>Tiêu đề tin tức</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['title'],
                        ENT_QUOTES,
                        'UTF-8'
                    );
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <a
                href="?page=<?php echo $i; ?>"
                class="<?php echo ($i == $page) ? 'active' : ''; ?>"
            >
                <?php echo $i; ?>
            </a>
        <?php } ?>
    </div>

</div>

</body>
</html>

<?php mysqli_close($conn); ?>
