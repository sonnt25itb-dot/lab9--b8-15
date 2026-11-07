
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "binhchon";

// Ket noi MySQL
$config = mysqli_connect($host, $user, $pass, $db);

// Kiem tra ket noi
if (!$config) {
    die("Ket noi that bai: " . mysqli_connect_error());
}

// Ho tro tieng Viet
mysqli_set_charset($config, "utf8mb4");
