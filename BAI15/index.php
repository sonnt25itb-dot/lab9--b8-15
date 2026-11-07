
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 15 - Bình chọn PHP</title>
</head>
<body>

    <h2>BÌNH CHỌN</h2>

    <form method="get" action="xulybinhchon.php">

        <p>
            Bạn nghĩ sao về chất lượng của
            trang web vku.udn.vn?
        </p>

        <?php
        require_once("config.php");

        $sql = "SELECT * FROM phuongan WHERE idBC = 1";
        $result = mysqli_query($config, $sql);

        $i = 0;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <label>
                <input
                    type="radio"
                    name="idPA"
                    value="<?php echo $row['idPA']; ?>"
                    <?php
                    if ($i == 0) {
                        echo "checked";
                    }
                    ?>
                >

                <?php
                echo htmlspecialchars($row['MoTa']);
                ?>
            </label>

            <br><br>

        <?php
            $i++;
        }
        ?>

        <input
            type="submit"
            name="Submit"
            value="Xem kết quả"
        >

    </form>

</body>
</html>
