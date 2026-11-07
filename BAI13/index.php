
<?php
$conn = new mysqli("localhost", "root", "", "rss");

if ($conn->connect_error) {
    die("Lỗi kết nối MySQL: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$sql = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Lỗi truy vấn dữ liệu");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 13 - RSS Tin Tức</title>
    <link rel="alternate"
          type="application/rss+xml"
          title="RSS Tin Tức"
          href="rss.php">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
        }

        header {
            background: #1e40af;
            color: white;
            padding: 25px;
            text-align: center;
        }

        .container {
            max-width: 850px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        .news {
            padding: 18px 0;
            border-bottom: 1px solid #ddd;
        }

        .news h3 {
            color: #1d4ed8;
            margin-bottom: 8px;
        }

        .news p {
            color: #475569;
        }

        .rss-btn {
            display: inline-block;
            background: #f97316;
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<header>
    <h1>COMPUTER ABC</h1>
    <p>TRANG TIN TỨC - BÀI 13</p>
</header>

<div class="container">

    <h2>Danh sách tin tức</h2>

    <a class="rss-btn" href="rss.php">
        Xem RSS XML
    </a>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($row['title']) ?>
            </h3>

            <p>
                <?= htmlspecialchars($row['description']) ?>
            </p>

            <a href="<?= htmlspecialchars($row['link']) ?>">
                Xem chi tiết
            </a>
        </div>
    <?php endwhile; ?>

</div>

</body>
</html>

<?php $conn->close(); ?>
