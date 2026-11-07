
<?php
session_start();

$message = "";

if (isset($_POST['submit'])) {
    $input = $_POST['input'] ?? '';

    if (
        isset($_SESSION['captcha']) &&
        $input === $_SESSION['captcha']
    ) {
        $message = "* Right captcha !!!";
    } else {
        $message = "* Wrong captcha !!!";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 14 - CAPTCHA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ecf0f1;
        }

        form {
            width: 450px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border: 1px solid #95a5a6;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        input[type="text"] {
            height: 40px;
            padding: 5px;
            margin-right: 10px;
        }

        input[type="submit"] {
            padding: 10px 25px;
            background: #2980b9;
            color: white;
            border: none;
            cursor: pointer;
        }

        #message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<form action="" method="POST">
    <h2>CAPTCHA - WEB</h2>

    <p>Please enter the captcha:</p>

    <input type="text" name="input" required>

    <img src="captcha.php" alt="CAPTCHA">

    <br><br>

    <input type="submit" name="submit" value="Send">

    <p id="message">
        <?php echo htmlspecialchars($message); ?>
    </p>
</form>

</body>
</html>
