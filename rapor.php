<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$dbname = "otobus_sistemi";
$user = "root";
$pass = "";

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);


    $sql = "
        SELECT s.sube_adi, st.ad AS temsilci_ad, st.soyad AS temsilci_soyad, st.telefon
        FROM Subeler s
        LEFT JOIN Satis_Temsilcileri st ON s.sube_id = st.sube_id
        ORDER BY s.sube_adi, st.ad
    ";

    $stmt = $conn->query($sql);
    $results = $stmt->fetchAll();

    if (!$results) {
        echo "Kayıt bulunamadı.";
    } else {
        echo "<h2>Şube ve Satış Temsilcileri Listesi</h2>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>Şube Adı</th><th>Temsilci Adı</th><th>Temsilci Soyadı</th><th>Telefon</th></tr>";

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['sube_adi']) . "</td>";
            echo "<td>" . htmlspecialchars($row['temsilci_ad'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['temsilci_soyad'] ?? '-') . "</td>";
            echo "<td>" . htmlspecialchars($row['telefon'] ?? '-') . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

} catch (PDOException $e) {
    die("Bağlantı veya sorgu hatası: " . $e->getMessage());
}
?>