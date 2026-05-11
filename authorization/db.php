<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('DB_HOST', '127.0.0.1:3307'); 
define('DB_USER', 'root');
define('DB_PASS', ''); 
define('DB_NAME', 'cleanhome_db');

$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    echo "<div style='color:red; background:#fee; padding:20px; border:2px solid red; font-family:sans-serif;'>";
    echo "<h2>Помилка підключення до БД!</h2>";
    echo "Спроба підключення до порта 3307 не вдалася. Перевір налаштування в XAMPP.";
    echo "</div>";
    exit();
}

mysqli_set_charset($conn, "utf8");
?>