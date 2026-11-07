
<?php
// Ket noi MySQL
$conn = new mysqli("localhost", "root", "", "rss");

if ($conn->connect_error) {
    http_response_code(500);
    die("Loi ket noi MySQL");
}

$conn->set_charset("utf8mb4");

// Lay danh sach tin tuc
$sql = "SELECT id, title, link, description FROM news ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);
    die("Loi truy van du lieu");
}

// Xuat du lieu RSS
header("Content-Type: application/rss+xml; charset=UTF-8");

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0">
    <channel>
        <title>COMPUTER ABC - Tin tuc</title>
        <link>http://localhost:8080/LAB9-B8-15/BAI13/</link>
        <description>Kenh RSS tin tuc cua website</description>
        <language>vi</language>

        <?php while ($row = $result->fetch_assoc()): ?>
        <item>
            <title><?= htmlspecialchars($row['title'], ENT_XML1 | ENT_QUOTES, 'UTF-8') ?></title>
            <link><?= htmlspecialchars($row['link'], ENT_XML1 | ENT_QUOTES, 'UTF-8') ?></link>
            <description><?= htmlspecialchars($row['description'], ENT_XML1 | ENT_QUOTES, 'UTF-8') ?></description>
            <guid isPermaLink="false">news-<?= (int)$row['id'] ?></guid>
        </item>
        <?php endwhile; ?>

    </channel>
</rss>
<?php
$conn->close();
?>
