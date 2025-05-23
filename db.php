<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$dbname = "otobus_sistemi";  // Senin veritabanı adı
$user = "root";
$pass = "";

try {
    // DSN (Data Source Name) oluşturulur
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    // PDO nesnesi oluşturulur, hata modu istisna olarak ayarlanır
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

} catch (PDOException $e) {
    die("Bağlantı başarısız: " . $e->getMessage());
}
?>