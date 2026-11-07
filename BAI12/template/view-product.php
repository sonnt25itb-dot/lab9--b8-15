
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Rating - Đánh giá sản phẩm</title>
    <link href="template/css.css" rel="stylesheet">
</head>
<body>
    <div id="container">
        <header>
            <h1>
                <a href="index.php">COMPUTER ABC</a>
            </h1>
        </header>

        <div id="main-wrapper">
            <div id="product-info">
                <?php echo $html; ?>
            </div>

            <div id="rating">
                <form action="" method="POST">
                    <h3>Đánh giá sản phẩm</h3>

                    <label>
                        <input type="radio" name="rate" value="5" checked>
                        5 sao
                    </label>

                    <label>
                        <input type="radio" name="rate" value="4">
                        4 sao
                    </label>

                    <label>
                        <input type="radio" name="rate" value="3">
                        3 sao
                    </label>

                    <label>
                        <input type="radio" name="rate" value="2">
                        2 sao
                    </label>

                    <label>
                        <input type="radio" name="rate" value="1">
                        1 sao
                    </label>

                    <p>
                        <input
                            type="submit"
                            name="rate_submit"
                            value="Đánh giá"
                            id="submit-button"
                        >
                    </p>
                </form>
            </div>
        </div>

        <footer></footer>
    </div>
</body>
</html>
