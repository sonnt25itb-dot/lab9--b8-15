
<?php
require_once("config.php");

// Lay noi dung cau hoi
$sql = "SELECT * FROM binhchon WHERE idBC = 1";
$result = mysqli_query($config, $sql);
$binhchon = mysqli_fetch_assoc($result);

$mota = $binhchon['MoTa'] ?? 'Ket qua binh chon';

// Tinh tong so luot binh chon
$sql = "SELECT SUM(SoLanChon) AS tongsolanchon
        FROM phuongan WHERE idBC = 1";

$result = mysqli_query($config, $sql);
$row = mysqli_fetch_assoc($result);

$tongsobinhchon = (int)($row['tongsolanchon'] ?? 0);

// Lay cac phuong an
$sql = "SELECT * FROM phuongan WHERE idBC = 1";
$result = mysqli_query($config, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả bình chọn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        table {
            border-collapse: collapse;
            width: 650px;
        }

        th, td {
            border: 1px solid #999;
            padding: 12px;
        }

        th {
            background: #66ccff;
        }

        .bar-container {
            width: 150px;
            background: #eeeeee;
            height: 20px;
        }

        .bar {
            height: 20px;
            background: red;
        }
    </style>
</head>
<body>

<h2>KẾT QUẢ BÌNH CHỌN</h2>

<table>
    <tr>
        <th colspan="3">
            <?php echo htmlspecialchars($mota); ?>
        </th>
    </tr>

    <tr>
        <th>Phương án</th>
        <th>Tỷ lệ bình chọn</th>
        <th>Số lần chọn</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) {

        $solanchon = (int)$row['SoLanChon'];

        if ($tongsobinhchon > 0) {
            $phantram = ($solanchon / $tongsobinhchon) * 100;
        } else {
            $phantram = 0;
        }
    ?>

    <tr>
        <td>
            <?php echo htmlspecialchars($row['MoTa']); ?>
        </td>

        <td>
            <div class="bar-container">
                <div class="bar"
                     style="width: <?php echo $phantram; ?>%;">
                </div>
            </div>

            <?php echo round($phantram, 2); ?>%
        </td>

        <td>
            <?php echo $solanchon; ?>
        </td>
    </tr>

    <?php } ?>

    <tr>
        <td colspan="3" align="right">
            <strong>
                Tổng số lần chọn:
                <?php echo $tongsobinhchon; ?>
            </strong>
        </td>
    </tr>
</table>

<br>

<a href="index.php">Quay lại bình chọn</a>

</body>
</html>
