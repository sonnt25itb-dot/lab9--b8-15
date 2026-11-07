
<?php
require_once("config.php");

// Lay ma phuong an duoc chon
$idPA = filter_input(INPUT_GET, 'idPA', FILTER_VALIDATE_INT);

// Kiem tra du lieu
if (!$idPA) {
    die("Ban chua chon phuong an hop le!");
}

// Bat dau transaction
mysqli_begin_transaction($config);

try {
    // Tang tong so luot binh chon
    $sql1 = "UPDATE binhchon
             SET SoLanChon = SoLanChon + 1
             WHERE idBC = 1";

    // Tang so luot cua phuong an duoc chon
    $sql2 = "UPDATE phuongan
             SET SoLanChon = SoLanChon + 1
             WHERE idBC = 1 AND idPA = ?";

    $stmt = mysqli_prepare($config, $sql2);
    mysqli_stmt_bind_param($stmt, "i", $idPA);

    // Kiem tra phuong an co ton tai
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) !== 1) {
        throw new Exception("Phuong an khong hop le!");
    }

    if (!mysqli_query($config, $sql1)) {
        throw new Exception("Khong cap nhat duoc tong binh chon!");
    }

    mysqli_commit($config);
    mysqli_stmt_close($stmt);

    // Chuyen den trang ket qua
    header("Location: ketquabinhchon.php");
    exit;

} catch (Throwable $e) {
    mysqli_rollback($config);
    die("Binh chon that bai: " . htmlspecialchars($e->getMessage()));
}
